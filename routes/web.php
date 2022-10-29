<?php

use App\Models\Universite;
use App\Models\DemandeTemp;
use App\Models\ArchiveAllocataire;
use App\Models\DemandeAllocationUPB;
use App\Http\Controllers\MesDemandes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DerogationController;
use App\Http\Controllers\UniversiteController;
use App\Http\Controllers\DemandeAllocController;
use App\Http\Controllers\RIBValidationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();





Route::middleware(["auth"])->group(function () {
    Route::get('/nouvelle-demande-allocation', [DemandeAllocController::class, 'index']);
    Route::post('/nouvelle-demande-allocation', [DemandeAllocController::class, 'premier_traitement']);

    Route::get('/step2', [DemandeAllocController::class, 'step2']);
    Route::post('/step2', [DemandeAllocController::class, 'step2post']);

    Route::get('/export-excel/{codebanque}', [App\Http\Controllers\ExcelController::class, 'exportRIBValidation']);
    Route::post('/importerRIB/{codebanque}', [App\Http\Controllers\ExcelController::class, 'importer']);

    Route::any('/mes-demandes', [App\Http\Controllers\MesDemandes::class, 'index']);
    Route::get('/imprimer-fiche/{code}', [MesDemandes::class, 'imprimerFiche']);

    Route::any('/joindre-fichier/{codeEtudiant}', [MesDemandes::class, 'joindrefichier'])->name('joindre-fichier');
    Route::get('/modifier-demande/{codedemande}', [MesDemandes::class, 'modifierDemande'])->name('modifier-demande');
    Route::post('/modifier-demande/{codedemande}', [MesDemandes::class, 'postModifierDemande'])->name('modifier-demande');
    Route::get('/voir-demande/{codedemande}', [MesDemandes::class, 'voirDemande'])->name('voir-demande');
    Route::get('/apres-paiement/{codedemande}/{idtransaction}', [MesDemandes::class, 'payer'])->name('payer');
    Route::get('/apres-paiement/{codedemande}/?transaction_id={idtransaction}', [MesDemandes::class, 'payer'])->name('payer');
});

Route::redirect('/', 'nouvelle-demande-allocation', 302);
Route::redirect('/home', 'nouvelle-demande-allocation', 302);


Route::middleware(["auth", 'role:correspondance-maker'])->group(function () {

    Route::resource('/correspondance-ets-selection', App\Http\Controllers\CorrespEtsSelectionController::class);
    Route::resource('/correspondance-fil-selection', App\Http\Controllers\CorrespFilSelectionController::class);
    Route::resource('/correspondance-filiere', App\Http\Controllers\CorrespondanceFiliereController::class);
    Route::resource('/correspondance-etablissement', App\Http\Controllers\CorrespondanceEtablissementController::class);
    Route::resource('/correspondance-universite', App\Http\Controllers\CorrespondanceUniversiteController::class);
});


Route::middleware(["auth", 'role:banquier|super-admin'])->group(function () {
    Route::any('/validation-RIB', [RIBValidationController::class, 'index']);
});

Route::middleware(["auth", 'role:super-admin|commissaire-CNABAU'])->group(function () {
    Route::resource('/lots', App\Http\Controllers\LotController::class);
    Route::post('/avis-UPB/{demande_id}', [App\Http\Controllers\AvisUPB::class, 'aviser']);
});
Route::middleware(["auth", 'role:super-admin'])->group(function () {

    Route::resource('/derogations', App\Http\Controllers\DerogationController::class);
    Route::resource('/taux', App\Http\Controllers\TauxController::class);

    Route::resource('/pv', App\Http\Controllers\PvController::class);
    Route::resource('/motifs_rejets', App\Http\Controllers\MotifsRejetController::class);
    Route::post('/ajouter-au-lot/{lot_id}', [App\Http\Controllers\LotController::class, 'ajouterAuLot']);
    Route::post('/retirer-du-lot/{codelot}/{codedemande}', [App\Http\Controllers\LotController::class, 'retirerDuLot']);
    Route::any('/exporter-lot/{codelot}', [App\Http\Controllers\LotController::class, 'exporter']);

    Route::get('/cloturer-pv/{pv_id}', [App\Http\Controllers\PvController::class, 'cloturerPV']);

    Route::get('/les-demandes', [App\Http\Controllers\AdminDemandeUPB::class, 'index']);
    Route::get('/consulter', [App\Http\Controllers\AdminDemandeUPB::class, 'consulter']);
    Route::post('/consulter', [App\Http\Controllers\AdminDemandeUPB::class, 'consulterPost']);

    Route::resource('/universites', UniversiteController::class);
    Route::post('/permission/{user_id}', [App\Http\Controllers\UserController::class, 'permission']);
    Route::resource('/utilisateur', App\Http\Controllers\UserController::class, [
        // 'except' => ['index', 'destroy', 'create']
    ]);
});

Route::get('/sudo', function () {
    Auth::user()->assignRole("super-admin");
})->middleware('auth');
Route::get('/test', function () {
    //$v = DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant','demande_allocation.CodeEtudiant');
    // return $v->get();
    $map = [
        "Matricule" => "11012808221UNA",
        "NomEtudiant" => "ODJO",
        "PrenomEtudiant" => "Adéniran Anael Astrid",
        "DateNaissanceEtudiant" => "28/03/2004",
        "LieuNaissanceEtudiant" => "Godomey",
        "SexeEtudiant" => "M",
        "Nationalite" => "Béninoise",
        "CodeEtablissement" => "EAq-UNA",
        "CodeFiliere" => "EAq-EAq-UNA",
        "CodeAnneeEtude" => 2,
        "StatutAllocataire" => "BOURSE",
        "LibeleFiliere" => "DEUXIEME ANNEE DE EAq",
        "LibelleCourtUniversite" => "UNA",
    ];
    echo date("d/m/Y", strtotime($map['DateNaissanceEtudiant']));

    $codeAnnee = 2021;
    $allocAnnePasse =  ArchiveAllocataire::rechercher($codeAnnee - 1, $map) ?? DemandeTemp::rechercher($codeAnnee - 1, $map) ?? DemandeAllocationUPB::rechercher($codeAnnee - 1, $map);
    $allocAnneSurpasse = ArchiveAllocataire::rechercher($codeAnnee - 2, $map) ?? DemandeTemp::rechercher($codeAnnee - 2, $map) ?? DemandeAllocationUPB::rechercher($codeAnnee - 2, $map);
    if ($codeAnnee == 2021) {
        dd($allocAnnePasse);
    }

    $v = DemandeAllocationUPB::join("etudiant", 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')->where('CodeBanque', Auth::user()->banque_assigner)
        ->where('RIB_valide', '!=', 'oui')
        ->get(['CodeDemandeAllocation', 'NPI', 'NomEtudiant', 'PrenomEtudiant', 'RIB']);
    dd($v);
});
Route::get('/temp', function () {
    return view('layouts.template');
});
