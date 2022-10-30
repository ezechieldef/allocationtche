<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pv;
use App\Models\Lot;
use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\AssocPvDemande;
use App\Models\AnneeAcademique;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class PvController
 * @package App\Http\Controllers
 */
class PvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pvs = Pv::all();
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        return view('pv.index', compact('pvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pv = new Pv();
        return view('pv.create', compact('pv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pv::$rules);

        $pv = Pv::create($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv Créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pv = Pv::findOrFail($id);

        $groups = $this->statsGroups($id);

        return view('pv.show', compact('pv', 'groups'));
    }
    public function statsGroups(int $id)
    {

        $res = DB::select("select Ets.CodeUniversite, D.CodeAnneeAcademique, U.LibelleLongUniversite, U.CodeUniversite
        ,D.CodeNatureAllocation, Ets.LibelleEtablissement , count(*) nbr,
        (SELECT Count(*) from assoc_pv_demande AA WHERE AA.CodePV=A.CodePV AND AA.avis='Favorable' ) nbr_fav,
        (SELECT Count(*) from assoc_pv_demande AA WHERE AA.CodePV=A.CodePV AND AA.avis='Réservé' ) nbr_res,
        (SELECT Count(*) from assoc_pv_demande AA WHERE AA.CodePV=A.CodePV AND AA.avis='Défavorable' ) nbr_def
         from assoc_pv_demande A, demande_allocation D, etudiant E, filiere F ,etablissement Ets, universite U
        WHERE A.CodeDemandeAllocation= D.CodeDemandeAllocation AND
        D.CodeEtudiant=E.CodeEtudiant AND
        E.CodeFiliere=F.CodeFiliere AND
        F.CodeEtablissement= Ets.CodeEtablissement AND
        U.CodeUniversite= Ets.CodeUniversite AND
        A.CodePV='" . $id . "'
        GROUP BY D.CodeAnneeAcademique, Ets.CodeEtablissement, D.CodeNatureAllocation ", []);
        //dd($res);

        $groups = array();
        foreach ($res as $dem) {
            $annee = $dem->CodeAnneeAcademique;
            $univ = $dem->LibelleLongUniversite;
            $nature = $dem->CodeNatureAllocation;
            // Filiere::find($dem->CodeFiliere)->etablissement()->first()->universite()->first()->CodeUniversite;
            //$ets= Filiere::find($dem->CodeFiliere)->etablissement()->first()->CodeEtablissement;
            if (!in_array($annee, array_keys($groups))) {
                $groups[$annee] = [];
            }
            if (!in_array($univ, array_keys($groups[$annee]))) {
                $groups[$annee][$univ] = [];
            }
            if (!in_array($nature, array_keys($groups[$annee][$univ]))) {
                $groups[$annee][$univ][$nature] = [];
            }
            $groups[$annee][$univ][$nature][] = $dem;
        }
        return $groups;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pv = Pv::find($id);

        return view('pv.edit', compact('pv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pv $pv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pv $pv)
    {
        request()->validate(Pv::$rules);

        $pv->update($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (Lot::where('CodePV', $id)->count() != 0) {
            return redirect()->route('pv.index')
                ->with('error', 'Impossible de supprimer ce PV, Un ou plusieurs lots y sont encore associé (même si ces lots sont vide) ');
        }
        $pv = Pv::find($id);

        try {
            $pv->delete();
        } catch (\Throwable $th) {
            return redirect()->route('pv.index')
            ->with('error', 'Ce PV ne peut être supprimé');
        }

        return redirect()->route('pv.index')
            ->with('success', 'Pv supprimé avecc succes');
    }

    public function cloturerPV(int $codePV)
    {
        if (Lot::where('CodePV', $codePV)->where('status', 'OUVERT')->exists()) {
            return back()->with('error', 'Ce PV Contient encore des lots OUVERT');
        }
        if (AssocPvDemande::where('CodePV', $codePV)->count() < 1) {
            return back()->with('error', 'Ce PV ne contient aucun avis d\'aucun commissaire pour le moment, cloture impossible');
        }

        Lot::where('CodePV', $codePV)->delete();
        $pv = Pv::findOrFail($codePV);
        $pv->update(['statut' => 'cloturé']);
        return back()->with('success', 'PV :' . $pv->Refence_PV . ' Cloturé avec succès');
    }

    public function listeDefinitive(int $codePV)
    {
        $pv = Pv::findOrFail($codePV);
        if ($pv->statut != 'cloturé') {
            return back()->with('error', 'Ce PV n\'est pas cloturé');
        }
        $list = AssocPvDemande::join('demande_allocation', 'demande_allocation.CodeDemandeAllocation', 'assoc_pv_demande.CodeDemandeAllocation')
            ->join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->where('CodePV', $codePV)
            ->where('avis', 'Favorable')->get();
        $groups = array();
        foreach ($list as $dem) {
            $cle = $dem->CodeFiliere . '/' . $dem->CodeAnneeEtude . '/' . $dem->CodeNatureAllocation . '/' . (AnneeAcademique::find($dem->CodeAnneeAcademique)->LibelleAnneeAcademique);
            if (!in_array($cle, $groups)) {
                $groups[$cle] = [];
            }
            $groups[$cle][] = $dem;
        }

        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 350,
        ]);

        $data = ['list' => $list, 'pv' => $pv, 'groups' => $groups];
        //return view('upb.pdf_export_liste_definitive', $data);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->getDomPDF()->set_option("enable_remote", false);
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('upb.pdf_export_liste_definitive', $data);


        // $pdf = PDF::loadView('upb.pdf_export_lot', ['lot' => $lot, 'groups' => $groups, 'pv'=>$pv])->setPaper('a4', 'landscape');;
        // $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->download('liste definitive PV Ref ' . $pv->Reference_PV . '.pdf');
    }

    public function exporterStatistique(int $codePV)
    {
        $pv= Pv::findOrFail($codePV);
        $groups = $this->statsGroups($codePV);
        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 350,
        ]);

        $data = ['pv' => $pv, 'groups' => $groups];
        // return view('upb.pdf_export_stats_pv', $data);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->getDomPDF()->set_option("enable_remote", false);
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('upb.pdf_export_stats_pv', $data);

        return $pdf->download('statistique PV Ref ' . $pv->Reference_PV . '.pdf');
    }
}
