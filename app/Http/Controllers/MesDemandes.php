<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use PDF;
// use Barryvdh\Snappy\Facades\SnappyPdf;
//use Barryvdh\Snappy\PDF;
use App\Models\Banque;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ArchiveAllocataire;
use App\Models\DemandeAllocationUPB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
// use Barryvdh\DomPDF\PDF;

class MesDemandes extends Controller
{
    public function index()
    {
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        $etu = [];
        $dem = DemandeAllocationUPB::join("etudiant", 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->where("UtilisateurDemande", Auth::user()->id)->get();
        if (count($dem) != 0) {
            $tmp = $dem[0];
            $etu['Matricule'] = $tmp->Matricule;
            $etu['NomEtudiant'] = $tmp->NomEtudiant;
            $etu['PrenomEtudiant'] = $tmp->PrenomEtudiant;
            $etu['DateNaissanceEtudiant'] = $tmp->DateNaissanceEtudiant;
            $etu['SexeEtudiant'] = $tmp->SexeEtudiant;
            $etu['CodeFiliere'] = $tmp->CodeFiliere;
        }

        $ancienneAllocation = ArchiveAllocataire::where('NomEtudiant', $etu['NomEtudiant'] ?? null)
            ->where('PrenomEtudiant', $etu['PrenomEtudiant'] ?? null)
            ->where('Matricule', $etu['Matricule'] ?? null)
            ->where('DateNaissanceEtudiant', $etu['DateNaissanceEtudiant'] ?? null)->get();
        //dd($ancienneAllocation);
        $res = $ancienneAllocation->merge($dem);

        return view('upb.mes_demandes', [
            'demandes' => $res,
            'etudiant' => Etudiant::where('user_id', Auth::user()->id)->first() ?? null
        ]);
    }

    public function imprimerFiche(int $CodeDemandeAllocation)
    {
        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 350
        ]);

        $dem = DemandeAllocationUPB::find($CodeDemandeAllocation);
        if (is_null($dem)) {
            return abort(404, 'Erreur Demande Introuvable');
        }
        if (Auth::user()->id != $dem->UtilisateurDemande) {
            return abort(403, "Vous n'avez pas autorisation de voir cette fiche");
        }
        $dem = DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->where('CodeDemandeAllocation', $CodeDemandeAllocation)->first();
        // return view('upb.pdf_demande', ['dem'=>$dem]);

        $pdf = PDF::loadView('upb.pdf_demande', ['dem' => $dem]);
        return $pdf->download('fiche_demande.pdf');
        //  $pdf = PDF::loadView('upb.pdf_demande', ['dem'=>$dem]);

        //   return $pdf->download('fiche_demande.pdf');
        //        https://cdn.jsdelivr.net/npm/bootstrap-print-css@1.0.1/css/bootstrap-print.css
    }
    public function joindrefichier($codeEtudiant)
    {
        $etu = Etudiant::findOrFail($codeEtudiant);
        $request = request();
        foreach ($request->allFiles() as  $fname => $v) {
            request()->validate([$fname => 'mimes:pdf|max:2048']);
            if ($etu->$fname != '') {
                Storage::delete('public/' . $etu->$fname);
            }
            $emp = $v->store('pieces_jointes', 'public');
            $etu->update([$fname => $emp]);

            return redirect('/mes-demandes');
        }

        if (($request->all()['delete'] ?? null) == 'oui' && ($request->all()['delete_val'] ?? null) != '') {
            $champs = $request->all()['delete_val'];

            $v = Storage::delete('public/' . $etu->$champs);

            $etu->update([$champs => null]);
            return redirect('/mes-demandes');
        }
    }

    public function modifierDemande(int $CodeDemandeAllocation)
    {
        $demandeAllocation = DemandeAllocationUPB::findOrFail($CodeDemandeAllocation);
        $demLier =  DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->join('filiere', 'etudiant.CodeFiliere', 'filiere.codeFiliere')
            ->join('etablissement', 'filiere.CodeEtablissement', 'etablissement.CodeEtablissement')
            ->where('CodeDemandeAllocation', $CodeDemandeAllocation)->first();


        return view('upb.modifier_demande', ['demandeAllocation' => $demandeAllocation, 'demLier' => $demLier]);
    }
    public function postModifierDemande(int $CodeDemandeAllocation)
    {
        $demandeAllocation = DemandeAllocationUPB::findOrFail($CodeDemandeAllocation);
        $etu = Etudiant::findOrFail($demandeAllocation->CodeEtudiant);
        $all = request()->all();
        if ($demandeAllocation->Avicommission != '') {
            return redirect('/mes-demandes')->with("error", 'Vous ne pouvez plus modifier cette demande, elle n\'est plus en cours de traitement ');
        }
        if ($demandeAllocation->RIB_valide == 'oui') {
            try {
                unset($all['Banque']);
                unset($all['RIB']);
            } catch (\Throwable $th) {
                //throw $th;
            }
            request()->validate(
                [
                    'Telephone' => [
                        "required", "numeric", "digits:8",
                        Rule::unique('demande_allocation')->ignore(Auth::user()->id, 'UtilisateurDemande')
                    ],
                    "NPI" => [
                        "required", "digits_between:10,12", "numeric",
                        Rule::unique('demande_allocation')->ignore(Auth::user()->id, 'UtilisateurDemande')
                    ]
                ],
                ['Telephone.unique' => 'Ce N° de Téléphone a déjà été utilisé', 'NPI' => "Ce NPI a déjà été utilisé"]
            );
        } else {

            $banques = array_values(Banque::pluck('CodeBanque')->toArray());

            request()->validate(
                [
                    'Banque' => 'required|in:' . implode(',', $banques),
                    "RIB" => [
                        "required", "min:24",
                        Rule::unique('demande_allocation')->ignore(Auth::user()->id, 'UtilisateurDemande')
                    ],
                    'Telephone' => [
                        "required", "numeric", "digits:8",
                        Rule::unique('etudiant')->ignore(Auth::user()->id, 'user_id')
                    ],
                    "NPI" => [
                        "required", "digits_between:10,12", "numeric",
                        Rule::unique('etudiant')->ignore(Auth::user()->id, 'user_id')
                    ]
                ],
                [
                    'RIB.unique' => 'Ce RIB a déjà été utilisé', 'Telephone.unique' => 'Ce N° de Téléphone a déjà été utilisé',
                    'NPI.unique' => "Ce NPI a déjà été utilisé"
                ]
            );


            $banque = Banque::findOrFail($all['Banque']);
            request()->validate([
                "RIB" => "required|regex:/^" . $banque->regex . '/',
            ]);
        }


        $demandeAllocation->update($all);
        $etu->update($all);

        return redirect('/mes-demandes')->with('success', 'Demande d\'Allocation modifié avec succèss');
    }
    public function voirDemande(int $CodeDemandeAllocation)
    {
        $demandeAllocation = DemandeAllocationUPB::findOrFail($CodeDemandeAllocation);
        $demLier =  DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->join('filiere', 'etudiant.CodeFiliere', 'filiere.codeFiliere')
            ->join('etablissement', 'filiere.CodeEtablissement', 'etablissement.CodeEtablissement')
            ->where('CodeDemandeAllocation', $CodeDemandeAllocation)->first();


        return view('upb.voir_demande_card', ['demandeAllocation' => $demandeAllocation, 'demLier' => $demLier]);
    }
    public function payer(int $CodeDemandeAllocation, string $transaction_id)
    {
        if (DemandeAllocationUPB::where('idtransaction', $transaction_id)->exists()) {
            return redirect('/mes-demandes')->with('error', 'Ce paiement a déjà été utilisé');
        }
        $dem = DemandeAllocationUPB::find($CodeDemandeAllocation);

        if (is_null($dem)) {
            return redirect('/mes-demandes')->with('error', 'Demande non retrouvé');
        }
        $taux = AnneeAcademique::findOrFail($dem->CodeAnneeAcademique)->taux;

        $kkiapay = new \Kkiapay\Kkiapay(
            env('KKIA_PUBLIC_API_KEY'),
            env('KKIA_PRIVATE_API_KEY'),
            env('KKIA_SECRETE_API_KEY'),
            $sandbox = env('KKIA_SANBOX')
        );

        $res = $kkiapay->verifyTransaction($transaction_id);
        if ($res->status == 'SUCCESS' && $res->amount == $taux) {
            if ($dem->idtransaction != '') {
                return redirect('/mes-demandes')->with('error', 'Vous avez déjà payer pour cette demande');
            }
            $dem->update(['idtransaction' => $transaction_id]);
            return redirect('/mes-demandes')->with('success', 'Paiement effectué avec success');

        } elseif ($res->status == 'SUCCESS' && $res->amount != $taux) {
            return redirect('/mes-demandes')->with('error', 'Paiement non prise en compte : Le montant du paiement fourni (' . $res->amount . ' ) n\'est pas ce que êtes censé payé ( ' . $taux . ' ) ');
        }else{
            //dd($res);
            return redirect('/mes-demandes')->with('error', 'Paiement non retrouvé');
        }
        //dd($res);
    }
}
