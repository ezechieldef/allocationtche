<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\AssocLotsDemande;
use App\Models\AssocPvDemande;
use App\Models\DemandeAllocationUPB;
use App\Models\Pv;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

/**
 * Class LotController
 * @package App\Http\Controllers
 */
class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::paginate();

        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }

        return view('lot.index', compact('lots'))
            ->with('i', (request()->input('page', 1) - 1) * $lots->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lot = new Lot();
        return view('lot.create', compact('lot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lot::$rules);

        $lot = Lot::create($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lot = Lot::find($id);
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        return view('lot.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::find($id);

        return view('lot.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {
        $rules = Lot::$rules;
        $rules['Numero'] .= ',' . $lot->CodeLot . ',CodeLot';
        request()->validate($rules);

        $lot->update($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (AssocLotsDemande::where('CodeLot', $id)->count() != 0) {
            return redirect()->route('lots.index')
                ->with('error', 'Ce lot contient des demandes, suppression non autorisée.');
        }
        $lot = Lot::find($id)->delete();

        return redirect()->route('lots.index')
            ->with('success', 'Lot supprimé avec succès');
    }

    public function ajouterAuLot(int $lot_id)
    {

        $lot = Lot::findOrFail($lot_id);

        $all = request()->all();
        request()->validate([
            'CodeFiliere' => 'required',
            'CodeAnneeEtude' => 'required',
            'CodeNatureAllocation' => 'required',
            'effectif' => 'required'
        ]);
        //dd($all);

        $list_dem = DB::select("SELECT D.CodeDemandeAllocation from
        demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant
        AND E.CodeFiliere = ? AND D.CodeAnneeEtude = ? AND D.CodeNatureAllocation= ? AND D.CodeAnneeAcademique=?
        AND D.idtransaction!='' AND D.CodeDemandeAllocation not in

            (SELECT A.CodeDemandeAllocation from assoc_lots_demande A )
         LIMIT ? ", [
            $all['CodeFiliere'],
            $all['CodeAnneeEtude'],
            $all['CodeNatureAllocation'],
            $all['CodeAnneeAcademique'],
            $all['effectif'],
        ]);

        if (count($list_dem) == 0) {
            return redirect('/lots')->with('error', "Aucune demande correspondance n'a été identifé");
        }
        //dd($list_dem);
        $n = 0;
        foreach ($list_dem as $v) {

            if (!AssocLotsDemande::where('CodeLot', $lot->CodeLot)
                ->where('CodeDemandeAllocation', $v->CodeDemandeAllocation)->exists()) {

                AssocLotsDemande::create([
                    'CodeLot' => $lot->CodeLot,
                    'CodeDemandeAllocation' => $v->CodeDemandeAllocation
                ]);
                $n++;
            }
        }
        return redirect('/lots')->with('success', $n . " demande(s) ont été ajouté au lot N° " . $lot->Numero);
    }
    public function retirerDuLot($codelot, $codedemande)
    {
        $lot = Lot::find($codelot);
        if (is_null($lot)) {
            return back()->with('error', 'Lot introuvable');
        }

        AssocPvDemande::join('pv', 'pv.CodePV', 'assoc_pv_demande.CodePV')
            ->where('pv.CodePV', $lot->CodePV)
            ->where('assoc_pv_demande.CodeDemandeAllocation', $codedemande)->delete();

        $res = AssocLotsDemande::where('CodeDemandeAllocation', $codedemande)
            ->where('CodeLot', $codelot)
            ->delete();
        return back()->with('success', "Retrait effectué avec succès (" . $res . ")");
    }

    public function exporter($codelot)
    {
        $lot = Lot::findOrFail($codelot);
        $pv = $lot->pv()->first();
        $demandes = $lot->demandes()->get();
        $groups = array();
        foreach ($demandes as $assoc) {
            $dem = DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')->where('CodeDemandeAllocation', $assoc->CodeDemandeAllocation)->first();

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
        $data = ['lot' => $lot, 'groups' => $groups, 'pv' => $pv];
        //return view('upb.pdf_export_lot', $data);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->getDomPDF()->set_option("enable_remote", false);
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('upb.pdf_export_lot', $data);


        // $pdf = PDF::loadView('upb.pdf_export_lot', ['lot' => $lot, 'groups' => $groups, 'pv'=>$pv])->setPaper('a4', 'landscape');;
        // $pdf->getDomPDF()->set_option("enable_php", true);

        return $pdf->download('lot' . $lot->CodeLot . ' N° ' . $lot->Numero . '.pdf');
    }

    public function exporterStats(int $codelot)
    {
        $lot = Lot::findOrFail($codelot);
        $pv = $lot->pv()->first();


        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 350,
        ]);
        $data = ['lot' => $lot, 'pv' => $pv];
        // return view('upb.pdf_stats_lot', $data);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->getDomPDF()->set_option("enable_remote", false);
        //$pdf->setPaper('a4', 'landscape');
        $pdf->loadView('upb.pdf_stats_lot', $data);

        // $pdf = PDF::loadView('upb.pdf_export_lot', ['lot' => $lot, 'groups' => $groups, 'pv'=>$pv])->setPaper('a4', 'landscape');;
        // $pdf->getDomPDF()->set_option("enable_php", true);

        return $pdf->download('Statistique lot' . $lot->CodeLot . ' N° ' . $lot->Numero . '.pdf');
    }
}
