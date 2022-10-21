<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Banque;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Derogation;
use App\Models\Parametres;
use App\Models\Universite;
use App\Models\DemandeTemp;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\AnneeAcademique;
use Illuminate\Validation\Rule;
use App\Models\SelectionNouveau;
use App\Models\ArchiveAllocataire;
use Illuminate\Support\Facades\DB;
use App\Models\DemandeAllocationUPB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\CorrespondanceFiliere;
use App\Models\DemandeAllocationTemp;
use Illuminate\Support\Facades\Session;
use App\Models\Inscriptionuniversite2022;

class DemandeAllocController extends Controller
{
    //
    public function index()
    {

        return view('upb.form-demande');
    }
    public function premier_traitement()
    {
        // Validation du formulaire
        request()->validate([
            'Universite' => 'required',
            'Matricule' => 'required',
            // 'NumeroDeTable' => 'required|alpha_num',
            'DateNaissanceEtudiant' => 'required|date|before:today',
            'DipDeBase' => 'required',
            // 'AnneeObtention' => 'required|numeric|between:2000,2022',
        ]);
        //$all contient les donnnées du formulaire
        $all = request()->all();

        // Un tableau de tous les année scolaire .
        $cursus = [
            2020 => ['TYPE' => '', 'DISPO' => ''],
            2021 => ['TYPE' => '', 'DISPO' => ''],
            2022 => ['TYPE' => '', 'DISPO' => ''],
        ];

        foreach ($cursus as $codeAnnee => $anneeCourant) {

            $resp_annee = $this->algoParAnee($codeAnnee, $all);
            $cursus[$codeAnnee] = $resp_annee;

            if ($cursus[$codeAnnee] != false && ($cursus[$codeAnnee]['DISPO'] ?? null) == 'MAINTENANT') {
                // réflexion
                // Insérer dans etudiant temporaire et demande temporaire puis mettre à jour au niveau 2
                $cursus[$codeAnnee]['DATA'];
                $cursus[$codeAnnee]['DATA']['CodeUniversite'] = $all['Universite'];
                $cursus[$codeAnnee]['DATA']['CodeAnneeAcademique'] = $codeAnnee;
                $cursus[$codeAnnee]['DATA']['CodeTypeDemande'] = $cursus[$codeAnnee]['TYPE'];
                $cursus[$codeAnnee]['DATA']['user_id'] = Auth::user()->id;
                $cursus[$codeAnnee]['DATA']['Email'] = Auth::user()->email;
                $cursus[$codeAnnee]['DATA']['CodeNatureAllocation'] = $cursus[$codeAnnee]['DATA']['StatutAllocataire'];
                if (!is_null($cursus[$codeAnnee]['COMPLEMENT'])) {
                    foreach ($cursus[$codeAnnee]['COMPLEMENT'] as $ke => $va) {
                        $cursus[$codeAnnee]['DATA'][$ke] = $va;
                    }
                }
                $id = DemandeTemp::create($cursus[$codeAnnee]['DATA']);
                $old_ids = Session::get('DemandeTemporaire') ?? [];
                $old_ids[] = $id;
                Session::put('DemandeTemporaire', $old_ids);
            } elseif ($cursus[$codeAnnee] != false && !is_null($cursus[$codeAnnee]['TEMP_DATA'] ?? null)) {
                $old_ids = Session::get('DemandeTemporaire') ?? [];
                $old_ids[] = $cursus[$codeAnnee]['TEMP_DATA']->id;
                Session::put('DemandeTemporaire', $old_ids);
            }
        }

        //dd($cursus);
        //Si cursus ne contient que des false, c'est qu'il ne peut rien faire
        $queDesFalse = true;
        $newDemandeDispo = false;
        foreach ($cursus as $value) {
            if ($value != false) {
                $queDesFalse = false;
                if ($value['DISPO'] == 'MAINTENANT') {
                    $newDemandeDispo = true;
                }
            }
        }
        if ($queDesFalse) {
            $this->putError('Vous n\'avez aucune allocation universitaire non faite. ');
        }
        if (!$newDemandeDispo) {
            $this->putError('Vous n\'avez aucune nouvelle demande allocation universitaire à faire.');
        }
        //dd($cursus);
        // Si non, il peut continuer
        //dd(Session::get('errors'));
        Session::put('cursus', $cursus);
        return redirect('/step2');
    }
    public function algoParAnee(int $codeAnnee, $all)
    {
        $univ = $all['Universite'];
        $UnivParams = Parametres::UNIVERSITE[$univ . $codeAnnee] ?? null;
        //$response = $this->callAPI($all['Universite'], $all['Matricule'], $codeAnnee);
        $apiResponse = null;
        if (!is_null($UnivParams['api']) && $UnivParams['api'] != '') {
            $apiResponse = $this->callAPI($univ, $all['Matricule'], $codeAnnee);
        } elseif (!is_null($UnivParams['table']) && $UnivParams['table'] != '') {
            $apiResponse = $this->apiLocal($UnivParams['table'], $codeAnnee, $all['Matricule'], $univ);
        }
        if (is_null($apiResponse)) {
            return false;
        }
        // echo '<br>'.$codeAnnee.'<br>';
        //var_dump($apiResponse);
        $this->insererInscription($apiResponse);
        $apiResponse = $this->preparerDB($univ, $apiResponse);

        if (str_contains($apiResponse['DateNaissanceEtudiant'], '-')) {
            $apiResponse['DateNaissanceEtudiant'] = date("d/m/Y", strtotime($apiResponse['DateNaissanceEtudiant']));
        }
        $complement = array();
        $complement['ReferenceSelection'] = '';
        $complement['TypeSelection'] = '';
        $complement['SituationAnterieur'] = '';
        $complement['CodeSerie'] = '';
        $complement['TresorNatureAllocation'] = '';
        $complement['TresorMatricule'] = '';

        if ($apiResponse['StatutAllocataire'] == 'AIDES') {
            $complement['TresorNatureAllocation'] = 'Secours';
        } else {
            if (!is_null(Etablissement::find($apiResponse['CodeEtablissement'])) && Etablissement::find($apiResponse['CodeEtablissement'])->CodeTypeEtablissement == 'Ecole') {
                $complement['TresorNatureAllocation'] = 'Bourse Ecole';
            } else {
                $complement['TresorNatureAllocation'] = 'Bourse Faculté';
            }
        }


        $archive = ArchiveAllocataire::rechercher($codeAnnee - 1, $apiResponse);
        if (!is_null($archive)) {
            $complement['TresorMatricule'] = Universite::find($univ)->PrefixMatriculeTresor . $apiResponse['Matricule'];
        } else {
            //$complement['TresorMatricule'] = $archive->;
        }
        //dd($apiResponse);
        //var_dump($apiResponse);
        $aretourner = $this->typeDemande($apiResponse, $all, $univ, $codeAnnee);
        if ($aretourner == false) {

            return false;
        };



        $aretourner['DATA'] = $apiResponse;
        if (in_array('COMPLEMENT', array_keys($aretourner))) {
            foreach ($aretourner['COMPLEMENT'] as $key => $value) {
                $complement[$key] = $value;
            }
        }

        $aretourner['COMPLEMENT'] = $complement;

        return $aretourner;
    }

    public function apiLocal($table, $codeAnnee, $matricule, $univ)
    {

        $r = DB::select('SELECT * FROM ' . $table . ' WHERE Matricule = ? AND CodeAnneeAcademique = ? AND LibelleCourtUniversite= ?', [$matricule, $codeAnnee, $univ]);
        if (count($r) != 0) {
            return (json_decode(json_encode($r[0]), true));
        } else {
            return null;
        }
    }

    public function callAPI($univ, $matricule, $codeAnnee)
    {
        $params = Parametres::UNIVERSITE[$univ . $codeAnnee] ?? null;
        $champ_validation = '';
        $champ_type_alloc = '';
        $alloc_autorise = [];
        $var_name_api = [];
        switch ($univ) {
            case 'UAC':
                $champ_validation = 'validation1';
                $champ_type_alloc = 'statut';
                $alloc_autorise = ['BRS', 'SEC'];
                $var_name_api = [
                    'Matricule' => 'matricule',
                    'NomEtudiant' => 'nom',
                    'PrenomEtudiant' => 'prenom',
                    'DateNaissanceEtudiant' => 'date_de_naissance',
                    'LieuNaissanceEtudiant' => "lieu_de_naissance",
                    'SexeEtudiant' => "sexe",
                    'Nationalite' => "nationalite",
                    "CodeEtablissement" => "etablissement",
                    'CodeFiliere' => 'filiere',
                    'LibeleFiliere' => 'filiere',
                    "CodeAnneeEtude" => 'niveau',
                    'StatutAllocataire' => $champ_type_alloc,

                ];

                break;
            case 'UNA':
                $champ_validation = 'statut';
                $champ_type_alloc = 'type_alocation';
                $alloc_autorise = ['BRS'];
                $var_name_api = [
                    'Matricule' => 'matricule',
                    'NomEtudiant' => 'nom',
                    'PrenomEtudiant' => 'prenoms',
                    'DateNaissanceEtudiant' => 'date_naissance',
                    'LieuNaissanceEtudiant' => "lieu_naissance",
                    'SexeEtudiant' => "sexe",
                    'Nationalite' => "nationalite",
                    "CodeEtablissement" => "ecole",
                    "LibeleEtablissement" => "libspecialite",
                    'CodeFiliere' => 'specialite',
                    'LibeleFiliere' => 'libspecialite',
                    "CodeAnneeEtude" => 'annee_etude',
                    'StatutAllocataire' => $champ_type_alloc,
                ];

                $matricule = str_replace('UNA', '', $matricule);
                $matricule .= 'UNA';
                break;
            case 'UNSTIM':
                $champ_validation = 'isValidated';
                $champ_type_alloc = 'scholarship';
                $alloc_autorise = ['BRS','AU'];
                $var_name_api = [
                    'Matricule' => 'matricule',
                    'NomEtudiant' => 'lastName',
                    'PrenomEtudiant' => 'firstName',
                    'DateNaissanceEtudiant' => 'dateOfBirth',
                    'LieuNaissanceEtudiant' => "locationOfBirth",
                    'SexeEtudiant' => "gender",
                    'Nationalite' => "nationalite",
                    "CodeEtablissement" => "school",
                    "LibeleEtablissement" => "school",
                    'CodeFiliere' => 'speciality',
                    'LibeleFiliere' => 'speciality',
                    "CodeAnneeEtude" => 'currentLevel',
                    'StatutAllocataire' => $champ_type_alloc,
                ];
                break;
            default:
                # code...
                break;
        }

        $tempmatri = $matricule;
        $tempAnne = $codeAnnee;
        if ($univ == 'UNA') {
            $tempmatri = str_replace('UNA', '', $matricule);
            $tempmatri .= 'UNA';
        }
        if ($univ == 'UAC') {
            $tempAnne++;
        }

        $url_api = str_replace('{Matricule}', $tempmatri, $params['api']);
        $url_api = str_replace('{AnneeAcademique}', $tempAnne, $url_api);


        $r = Http::withoutVerifying()->accept('application/json')->withToken($params['token'])->withHeaders(['apiToken' => $params['token']])->get($url_api);
        $response = $r->json();
        $anne_lib = AnneeAcademique::find($codeAnnee)->LibelleAnneeAcademique;
        //dd($response);
        switch ($univ) {
            case 'UNA':

                if (in_array('message', array_keys($response))) {
                    $this->putError($response['message'] . '... Année Scolaire : ' . (AnneeAcademique::find($codeAnnee)->LibelleAnneeAcademique));
                    return;
                }
                //dd($response);
                //$response = array_values($response)[0];
                $response = $response['etudiants'];
                $temp = $response;


                foreach ($response as $key => $elem) {
                    if ($elem["annee_academique"] == $anne_lib) {
                        $response = $elem;
                        break;
                    } else {
                        unset($temp[$key]);
                    }
                }
                if (count($temp) == 0) {
                }
                $response = $temp;
                break;
            case 'UNSTIM':
                if (($response['status'] ?? null) == 500) {
                    Session::put('error', 'Erreur au niveau du serveur distant');
                    return null ;
                }
                if (in_array('error', array_keys($response))) {
                    $this->putError($response['message'] . '... Année Scolaire : ' . (AnneeAcademique::find($codeAnnee)->LibelleAnneeAcademique));
                    return null;
                }
                $etu = $response['student'];
                $path_ideal = null;
                foreach ($response['path'] as $key => $path) {
                    if ($anne_lib == ($path['academicYearDown'] . '-' . $path['academicYearUp'])) {
                        $path_ideal = $path;
                        break;
                    }
                }
                if (is_null($path_ideal)) {
                    return null;
                }
                foreach ($path_ideal as $key => $value) {
                    $etu[$key] = $value;
                }
                $etu['nationalite'] = 'Béninoise';
                $response = array($etu);
                //dd($response);
            default:
                # code...
                break;
        }

        if (count($response) > 1) {

            $correct = null;

            foreach ($response as $resp) {
                if (!is_null($resp[$champ_validation]) && in_array($resp[$champ_type_alloc], $alloc_autorise)) {
                    if (is_null($correct)) {
                        $correct = $resp;
                    } else {
                        $this->putError('Anomalie : Plusieurs bourses ont été identifiées, vous devez annuler 1... ' . $codeAnnee);
                        return;
                    }
                }
            }

            $response = $correct;
        } else {

            if (count($response) != 0 && !is_null($response[0][$champ_validation]) && in_array($response[0][$champ_type_alloc], $alloc_autorise)) {
                $response = $response[0];
            } else {
                $response = null;
            }
        }

        if (is_null($response)) {
            //Session::put('error', 'Aucune correspondance trouvé');
            // $this->putError('Aucune correspondance : ' . $codeAnnee);
            return null;
        }
        switch ($univ) {
            case 'UAC':
                if ($response['cycle'] === 2) {
                    $response[$var_name_api['CodeAnneeEtude']] += 3;
                }
                break;

            default:
                # code...
                break;
        }
        $aretourner = [
            'Matricule' => '',
            'NomEtudiant' => '',
            'PrenomEtudiant' => '',
            'DateNaissanceEtudiant' => '',
            'LieuNaissanceEtudiant' => "",
            'SexeEtudiant' => "",
            'Nationalite' => "",
            "CodeEtablissement" => "",
            'CodeFiliere' => '',
            "CodeAnneeEtude" => '',
            'StatutAllocataire' => '',
            'LibeleFiliere' => ''
        ];

        // echo '<pre>';
        // var_dump($response);
        // echo '</pre>';

        foreach ($aretourner as $key => $value) {
            $aretourner[$key] = $response[$var_name_api[$key]];
        }
        $aretourner['LibelleCourtUniversite'] = $univ;
        if (strlen($aretourner['Nationalite']) == 2) {
            $r = Pays::where("code2", $aretourner['Nationalite'])->first() ?? null;
            if (!is_null($r)) {
                $aretourner['Nationalite'] = $r['nationalite'];
            }
        }
        $aretourner['StatutAllocataire'] = str_replace('SEC', 'AIDES', $aretourner['StatutAllocataire']);
        $aretourner['StatutAllocataire'] = str_replace('BRS', 'BOURSE', $aretourner['StatutAllocataire']);
        $aretourner['StatutAllocataire'] = str_replace('AU', 'AIDES', $aretourner['StatutAllocataire']);


        return ($aretourner);
    }

    public function preparerDB($univ, $map)
    {
        if (is_null($map)) {
            return;
        }
        $ets = null;
        if (!is_null($map['CodeEtablissement'])) {
            $ets = Etablissement::find($map['CodeEtablissement']);
            if (is_null($ets)) {
                $r = Etablissement::where("CodeEtablissement", $map['CodeEtablissement'] . '-' . $univ)->where("CodeUniversite", $univ)->exists();

                if (!$r) {

                    $ets = Etablissement::create([
                        'CodeEtablissement' => $map['CodeEtablissement'] . '-' . $univ,
                        'LibelleEtablissement' => $map['CodeEtablissement'] . '-' . $univ,
                        'CodeUniversite' => $univ,
                        'CodeTypeEtablissement' => ($univ == 'UAC' ? 'Faculté' : 'Ecole'),
                        'valider' => 'non'
                    ]);
                } else {
                    $ets = Etablissement::where("CodeEtablissement", $map['CodeEtablissement'] . '-' . $univ)->where("CodeUniversite", $univ)->first();
                }
                $map['CodeEtablissement'] = $map['CodeEtablissement'] . '-' . $univ;
            }


        }

        if (!is_null($map['CodeFiliere'])) {
            $fil=Filiere::find($map['CodeFiliere']);
            if (is_null($fil)) {
                $r = Filiere::where("CodeFiliere", $map['CodeFiliere'] . '-' . $ets->CodeEtablissement)->where("CodeEtablissement", $ets->CodeEtablissement)->exists();

                if (!$r) {

                    Filiere::create([
                        'CodeFiliere' => $map['CodeFiliere'] . '-' . $ets->CodeEtablissement,
                        'LibelleFiliere' => $map['CodeFiliere'] . '-' . $ets->CodeEtablissement,
                        'CodeEtablissement' => $ets->CodeEtablissement,
                    ]);
                }
                $map['CodeFiliere'] = $map['CodeFiliere'] . '-' . $ets->CodeEtablissement;
            }
        }
        return $map;
    }

    public function insererInscription($map)
    {
        $map['user_id'] = Auth::user()->id;
        $res = Inscriptionuniversite2022::where('Matricule', $map['Matricule'])
            ->where('LibelleCourtUniversite', $map['LibelleCourtUniversite'])
            ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant'])
            ->where('CodeFiliere', $map['CodeFiliere'])
            ->where('CodeAnneeEtude', $map['CodeAnneeEtude']);

        if ($res->exists()) {
            ///Session::put('success', 'Demande modifier');
            $old = $res->first();
            $old->update($map);
            return $old;
        } else {
            //Session::put('success', 'Demande effectué');
            $r = Inscriptionuniversite2022::create($map);
            return $r;
        }

        return false;
    }
    public function putError(string $err)
    {
        $errors = Session::get('errorsDem') ?? [];
        $errors[] = $err;
        Session::put('errorsDem', $errors);
    }

    public function typeDemande($map, $saisi, $univ, $codeAnnee)
    {

        /* Vérifier s'il bénéficie déjà d'une allocation antérieur,
        ou s'il vient de faire et que c'est encore dans la table demandeAllocationUPB */
        $allocAnnePasse =  ArchiveAllocataire::rechercher($codeAnnee - 1, $map) ?? DemandeTemp::rechercher($codeAnnee - 1, $map) ?? DemandeAllocationUPB::rechercher($codeAnnee - 1, $map);
        $allocAnneSurpasse = ArchiveAllocataire::rechercher($codeAnnee - 2, $map) ?? DemandeTemp::rechercher($codeAnnee - 2, $map) ?? DemandeAllocationUPB::rechercher($codeAnnee - 2, $map);

        // if ($codeAnnee == 2021) {
        //     dd($allocAnnePasse);
        // }
        /* Vérifer s'il a déjà fait une demande cette année */
        $deja_fait = DemandeAllocationUPB::rechercher($codeAnnee, $map) ?? DemandeTemp::rechercher($codeAnnee, $map) ?? ArchiveAllocataire::rechercher($codeAnnee, $map);
        if (!is_null($deja_fait)) {
            return ['TYPE' => $deja_fait['CodeTypeDemande'], 'DISPO' => 'OUI', 'TEMP_DATA' => (DemandeTemp::rechercher($codeAnnee, $map))];
        }

        // Si aucune demande trouvé en son nom pour 2 dernieres année et est passé en année supérieur
        // cas d'une probable attributionf

        if ($map['CodeAnneeEtude'] == 1 && is_null($allocAnnePasse) && is_null($allocAnneSurpasse)) {
            //S'il est sélectionner pour l'année de la variable $codeAnnée
            echo 'cas attrib';
            $selection = SelectionNouveau::rechercher($codeAnnee, $map, $saisi);

            if (!is_null($selection)) {

                // Si il y a correspondance entre les filiere de sa sélection et la filiere de l'API :: Attribution confirmé
                if (
                    $selection->CodeUniversite == $univ &&
                    Etablissement::correspondreSelection($map['CodeEtablissement'], $selection->etablissementSelection) &&
                    Filiere::correspondreSelection($map['CodeFiliere'], $selection->libfiliere)
                ) {

                    $type_demande = 'Attribution';
                    $complement = array();
                    $complement['CodeSerie'] = $selection->serie;
                    $complement['ReferenceSelection'] = $selection->positionnorm;
                    $complement['TypeSelection'] = $selection->mode;

                    return ['TYPE' => $type_demande, 'DISPO' => 'MAINTENANT', 'COMPLEMENT' => $complement];
                } else {
                    $this->putError('Cas d\'une probable Attribution');
                    $this->putError("L'étudiant a été retrouvé dans la liste des sélections, mais ne s'est pas inscrit dans la bonne filière / bon Etablissement ... Filière de sélection : " . $selection->libfiliere . ' | ' . " Filière d'inscription : " . $map['CodeFiliere'] . ' | ' . " Etablissement de sélection : " . $selection->etablissementSelection . ' | ' . " Etablissement d'inscription : " . $map['CodeEtablissement']);
                }
            } else {
                $this->putError('Cas d\'une probable Attribution');
                $this->putError("L'étudiant n'a pas été retrouvé dans la liste des sélections ($codeAnnee)");
            }
        }
        // Si demande de l'année passé trouvé et est passé en classe supérieur : cas d'un Renouvellement
        if (!is_null($allocAnnePasse) && ($allocAnnePasse->CodeAnneeEtude + 1) == $map['CodeAnneeEtude']) {
            //Si correspondance entre la filiere de l'année passé et celle ci

            if (
                Etablissement::correspondre($map['CodeEtablissement'], $allocAnnePasse->CodeEtablissement)
                && Filiere::correspondre($map['CodeFiliere'], $allocAnnePasse->CodeFiliere)
            ) {
                $type_demande = 'Renouvellement';

                $complement = array();
                $t = AnneeAcademique::find($codeAnnee - 1)->LibelleAnneeAcademique . '/' . $allocAnnePasse->CodeFiliere . '/' . $allocAnnePasse->CodeAnneeEtude . '/';
                $t .= ($allocAnnePasse->CodeNatureAllocation ?? $allocAnnePasse->StatutAllocataire);
                $complement['SituationAnterieur'] = $t;

                return ['TYPE' => $type_demande, 'DISPO' => 'MAINTENANT', 'COMPLEMENT' => $complement];
            } else {
                echo 'cas renew fil echec';
                var_dump($map);
                dd([

                    'ets' =>    Etablissement::correspondre($map['CodeEtablissement'], $allocAnnePasse->CodeEtablissement),
                    'fil' => Filiere::correspondre($map['CodeFiliere'], $allocAnnePasse->CodeFiliere)
                ]);
                $this->putError("Cas d'un renouvellement");
                $this->putError("La filière / etablissement de l'année précédente, n'est pas conforme à celle de cette année ... Filiere Année précédente : " . $allocAnnePasse->CodeFiliere . " |  Filière inscription actuel : " . $map['CodeFiliere'] . " || Etablissement année précédente : " . $allocAnnePasse->CodeEtablissement . "  | Etablissement inscription actuel : " . $map['CodeEtablissement']);
            }
        } elseif (!is_null($allocAnneSurpasse) && ($allocAnneSurpasse->CodeAnneeEtude + 1) == $map['CodeAnneeEtude']) {
            // ^^ Si demande de l'année surpassé trouvé et est passé en classe supérieur : cas d'un rétablissement
            //Si correspondance entre la filiere de l'année passé et celle ci

            $annedebut = Parametres::AnneeDebutFormation($codeAnnee, $map);
            if ($annedebut != 0) {
                $dureeformation = (Filiere::find($map['CodeFiliere'])->DureFormation);
                $max = $annedebut + $dureeformation + ($dureeformation > 3 ? 2 : 1);
                if ($codeAnnee == $max) {
                    $this->putError("Cas d'un Redoublement successif");
                    $this->putError("Votre cursus a commencé en " . ($annedebut) . '-' . ($annedebut + 1));
                    $this->putError("Dans la norme, vous êtes censé finir votre cursus au plus tard dans l'année académique : " . ($max - 1) . '-' . ($max));
                    return false;
                }
            }

            if (
                Etablissement::correspondre($map['CodeEtablissement'], $allocAnneSurpasse->CodeEtablissement)
                && Filiere::correspondre($map['CodeFiliere'], $allocAnneSurpasse->CodeFiliere)
            ) {
                $type_demande = 'Rétablissement';

                $complement = array();
                $t = AnneeAcademique::find($codeAnnee - 2)->LibelleAnneeAcademique . '/' . $allocAnneSurpasse->CodeFiliere . '/' . $allocAnneSurpasse->CodeAnneeEtude . '/';
                $t .= ($allocAnneSurpasse->CodeNatureAllocation ?? $allocAnneSurpasse->StatutAllocataire);
                $complement['SituationAnterieur'] = $t;

                return ['TYPE' => $type_demande, 'DISPO' => 'MAINTENANT', 'COMPLEMENT' => $complement];
            } else {
                $this->putError("Cas d'un rétablissement ");
                $this->putError("La filière / etablissement de l'année précédente, n'est pas conforme à celle de cette année ... Filiere Année précédente : " . $allocAnnePasse->CodeFiliere . " |  Filière inscription actuel : " . $map['CodeFiliere'] . " || Etablissement année précédente : " . $allocAnnePasse->CodeEtablissement . "  | Etablissement inscription actuel : " . $map['CodeEtablissement']);
                $this->putError("Si vous pensez qu'il s'agit de la même filière / Etablissement anoté différement, veuillez signaler cela à la DBAU ");
            }
        }
        //S'il dispose d'une dérogation
        $derogation = Derogation::rechercher($codeAnnee, $map);

        if (!is_null($derogation)) {
            if (
                Etablissement::correspondre($map['CodeEtablissement'], $derogation->CodeEtablissement)
                && Filiere::correspondre($map['CodeFiliere'], $derogation->CodeFiliere)
            ) {
                $type_demande = 'Rétablissement';
                $complement = array();
                $complement['SituationAnterieur'] = 'Dérogation';
                return ['TYPE' => $type_demande, 'DISPO' => 'MAINTENANT'];
            } else {
                $this->putError("Cas d'une dérogation ");
                $this->putError("La filière / etablissement de la dérogation , n'est pas conforme à celle de l'inscription ... Filiere dérogation : " . $derogation->CodeFiliere . " |  Filière inscription actuel : " . $map['CodeFiliere'] . " || Etablissement derogation : " . $derogation->CodeEtablissement . "  | Etablissement inscription actuel : " . $map['CodeEtablissement']);
            }
        } else {
            if ($codeAnnee == 2022) {
                dd('dero non trouvé');
            }
        }
        $this->putError('Clarification de cursus');


        return false;
    }


    public function step2()
    {
        $v = DemandeTemp::where('user_id', Auth::user()->id);
        if (!$v->exists() || is_null(Session::get('cursus') ?? null)) {
            return redirect('/')->with("error", "Veuillez procéder étape par étape");
        }
        $cursus = Session::get('cursus');

        return view('upb.step2', ['demTemp' => $v->get()])->with([
            'cursus' => $cursus
        ]);
    }
    public function step2post()
    {
        // if ($inscription_id = Session::get('CodeEtudiant')) {
        //     $ins = Inscriptionuniversite2022::findOrFail($inscription_id)->toArray();
        // }

        $demAttente = DemandeTemp::where('user_id', Auth::user()->id);
        if (!$demAttente->exists() || is_null(Session::get('cursus') ?? null)) {
            return redirect('/')->with("error", "Veuillez procéder étape par étape");
        }
        $demAttente = $demAttente->get();
        $all = request()->all();
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

        foreach ($demAttente as $demande) {
            $ins = array_merge($demande->toArray(), $all);
            $ins['CodeBanque'] = $ins['Banque'];
            $ins['UtilisateurDemande'] = Auth::user()->id;
            $ins['DateDemande'] = date('Y-m-d');
            $ins['idtransaction'] = '';
            $ins['user_id'] = Auth::user()->id;


            $etu = Etudiant::rechercher($ins);
            if (!is_null($etu)) {
                if ($etu->user_id != Auth::user()->id) {
                    $demande->delete();
                    return redirect('/mes-demandes')->with('error', "Vous n'êtes pas autorisé à faire une demande pour un autre étudiant");
                }
                $etu->update($ins);
            } else {
                if (Etudiant::where('user_id', Auth::user()->id)->exists()) {
                    $demande->delete();
                    return redirect('/mes-demandes')->with('error', "Vous n'êtes pas autorisé à faire une demande pour un autre étudiant");
                }

                $etu = Etudiant::create($ins);
            }
            $ins['CodeEtudiant'] = $etu->CodeEtudiant;

            $demUPB = DemandeAllocationUPB::rechercher($ins['CodeAnneeAcademique'], $ins);
            if (!is_null($demUPB)) {
                $demUPB->update($ins);
            } else {
                $etu = DemandeAllocationUPB::create($ins);
            }
            //DemandeTemp::where('user_id', Auth::user()->id)->delete();
            $demande->delete();
        }

        return redirect('/mes-demandes')->with('success', 'Demande effectué avec success');
    }
}
