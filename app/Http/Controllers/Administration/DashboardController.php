<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DemandeAllocationUPB;
use App\Models\AnneeAcademique;
use App\Models\Etablissement;
use App\Models\Universite;


class DashboardController extends Controller
{

	public function index(){


		// Nombre de demandes total
		$nombre_demandes_total = DemandeAllocationUPB::count();

		// Nombre de demandes total sur l'annee academique
		$nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->count();

		// Nombre de demandes traitées
		$nombre_demandes_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->count();

		// Nombre de demandes en attente
		$nombre_demandes_attentes = $nombre_demandes_total_year - $nombre_demandes_traitees ;

		/**
		 * FORMULAIRE
		 **/
		$annees_acad = AnneeAcademique::select('CodeAnneeAcademique','LibelleAnneeAcademique')->orderby('CodeAnneeAcademique', 'DESC')->get();
		$universites = Universite::select('CodeUniversite', 'LibelleLongUniversite')->get();
		$etablissements = Etablissement::select('CodeEtablissement', 'LibelleEtablissement')->get();


		/**
		 * GRAPHE
		 *****************************************************************************************************************************/

		// UAC
		$g_uac_total = $nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UAC')->count();
		$g_uac_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UAC')->count();

		// UNSTIM
		$g_unstim_total = $nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNSTIM')->count();
		$g_unstim_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNSTIM')->count();

		// UP
		$g_up_total = $nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UP')->count();
		$g_up_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UP')->count();

		// UNA
		$g_una_total = $nombre_demandes_total_year = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNA')->count();
		$g_una_traitees = DemandeAllocationUPB::where('CodeAnneeAcademique', date('Y', strtotime('-1 year')))->join('assoc_pv_demande', 'assoc_pv_demande.CodeDemandeAllocation', 'demande_allocation.CodeDemandeAllocation')->join('etudiant', 'etudiant.codeEtudiant', 'demande_allocation.CodeEtudiant')->join('filiere', 'filiere.CodeFiliere', 'etudiant.CodeFiliere')->join('etablissement','etablissement.CodeEtablissement', 'filiere.CodeEtablissement')->join('universite', 'universite.CodeUniversite', 'etablissement.CodeUniversite')->where('universite.CodeUniversite', 'UNA')->count();





		return view('administration.dashboard', compact('nombre_demandes_total', 'nombre_demandes_total_year', 'nombre_demandes_traitees', 'nombre_demandes_attentes', 'annees_acad', 'etablissements', 'universites', 'g_uac_total', 'g_uac_traitees', 'g_unstim_total', 'g_unstim_traitees', 'g_up_total', 'g_up_traitees', 'g_una_total', 'g_una_traitees'));
	}



	public function consulter(Request $request){

		return view('administration.resultats_recherche');
	}


}
