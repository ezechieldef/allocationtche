<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DemandeAllocationUPB;
use App\Models\AnneeAcademique;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Universite;
use DB;


class DashboardController extends Controller
{

	public function index(){


		// Nombre de demandes total
		$nombre_demandes_total = DemandeAllocationUPB::count();

		// Nombre de demandes total de l'année en cours
		$nombre_demandes_total_this_year = DemandeAllocationUPB::count();

		// Nombre de demandes total sur l'annee academique en cours
		$nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->count();
		//return var_dump($nombre_demandes_total_year);

		$a = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->count();


		// Nombre de demandes traitées
		$nombre_demandes_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->count();
		//$nombre_demandes_traitees = DemandeAllocationUPB::where("Aviscommission", "!=", "")->count ();

		// Nombre de demandes en attente
		//$nombre_demandes_attentes = $nombre_demandes_total_year - $nombre_demandes_traitees ;
		$nombre_demandes_attentes = $nombre_demandes_total_this_year - $nombre_demandes_traitees ;


		// Nombre de demandes total sur l'annee academique

		//$nombre_demandes_total_nopay = DemandeAllocationUPB::where('StatutPaiement', "2022")->count();

		/**
		 * FORMULAIRE
		 **/
		$annees_acad = AnneeAcademique::select('CodeAnneeAcademique','LibelleAnneeAcademique')->orderby('CodeAnneeAcademique', 'DESC')->get();
		$universites = Universite::select('CodeUniversite', 'LibelleLongUniversite')->get();
		$etablissements = Etablissement::select('CodeEtablissement', 'LibelleEtablissement')->get();
		$filieres = Filiere::select('CodeFiliere', 'LibelleFiliere')->get();


		/**
		 * GRAPHE
		 *****************************************************************************************************************************/

		// UAC
		$g_uac_total = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UAC')->count();
		$g_uac_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UAC')->count();

		// UNSTIM
		$g_unstim_total = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNSTIM')->count();
		$g_unstim_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNSTIM')->count();

		// UP
		$g_up_total = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UP')->count();
		$g_up_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UP')->count();

		// UNA
		$g_una_total = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNA')->count();
		$g_una_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', "2022")->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNA')->count();





		return view('administration.dashboard', compact('nombre_demandes_total', 'nombre_demandes_total_year', 'nombre_demandes_traitees', 'nombre_demandes_attentes', 'annees_acad', 'etablissements', 'universites', 'filieres', 'g_uac_total', 'g_uac_traitees', 'g_unstim_total', 'g_unstim_traitees', 'g_up_total', 'g_up_traitees', 'g_una_total', 'g_una_traitees', 'a'));
	}



	public function consulter(Request $request){
		$inputs = $request->all();
		unset($inputs["_token"]);
		$query = "WHERE 1=1 ";
		foreach($inputs as $key => $input){ 
			if($input != NULL){
				$query .= ' AND '.str_replace("_", ".",$key).'="'.$input.'"' ;
			}
		}
		/*$data = DemandeAllocationUPB::join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')
				->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')
				->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')
				->orWhere('CodeAnneeAcademique', $request->annee_academique)
				->orWhere('etablissement.CodeEtablissement', $request->etablissement)
				->orWhere('CodeAnneeEtude', $request->annee_etude)
				->Where('CodeTypeDemande', $request->type_allocation)
				->orWhere('CodeNatureAllocation', $request->nature_allocation)
				->orWhere('Avissis', $request->avis)
				->orWhere('etudiant.SexeEtudiant', $request->sexe)
				//->orWhere('StatutPaiement', $request->paiement_frais)
				->get();*/
		try {



			$data = DB::select("SELECT * FROM demande_allocation 
			               JOIN etudiant ON etudiant.CodeEtudiant = demande_allocation.CodeEtudiant
						   JOIN filiere ON etudiant.CodeFiliere = filiere.CodeFiliere
						   JOIN etablissement ON etablissement.CodeEtablissement = filiere.CodeEtablissement ".$query);


		} catch (\Throwable $th) {
			return var_dump($th->getMessage());
		}
		
				
		return view('administration.resultats_recherche', compact('data'));
	}


	public function getEtablissement(Request $request){
		$etablissements = Etablissement::select('CodeEtablissement', 'LibelleEtablissement')->where('CodeUniversite', $request->code_univ)->get();
		return response()->json($etablissements);
	}

	public function getFiliere(Request $request){
		$filieres = Filiere::select('CodeFiliere', 'LibelleFiliere')->where('CodeEtablissement', $request->code_etab)->get();
		return response()->json($filieres);
	}



}
