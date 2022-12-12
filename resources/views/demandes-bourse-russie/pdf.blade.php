<style>


</style>
<!DOCTYPE html>
<html lang="fr">
@php

@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css --}}
    {{-- <link rel="stylesheet" href="{{ asset('bs5assets/css/styles.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('bs5assets/fonts/font-awesome.min.css') }}"> --}}
</head>

<body style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
<center>

    <img src="https://beraca-transport.net/EGLISEDEVILLE/v.png" alt="">
</center>

    {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Coat_of_arms_of_Benin.svg?download" alt=""> --}}

    {{-- <img src="{{ storage_path('app/public/v.png') }}" alt=""> --}}
    <style>
        .btn-style {
            background-color: rgba(0, 0, 0, .05);
            /* border: 1px dashed grey; */
            padding: 5px;
        }

        .col-auto {
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
        }

        tr {
            margin: 3px;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <center>
        <h2 style="text-decoration: underline">Direction des Bourses et Aides Universitaire</h2>

        <h3 class="mb-3"> Fiche d'inscription : Bourse de Coopération Russe </h4>
    </center>


    <table style="width: 100%" border="1px dashed grey">
        <tr>
            <td>
                <strong>Code Demande</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseRussie->code }}</div>
                </div>
            </td>
            <td colspan="2">
                <strong>Nom</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseRussie->nom }}</div>
                </div>
            </td>
            <td colspan="3">
                <strong>Prénoms</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseRussie->prenoms }}</div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Date Naissance:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->date_naissance }}</div>
            </td>

            <td>
                <strong>Sexe:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->sexe }}</div>
            </td>

            <td colspan="3">
                <strong>Lieu Naissance:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->lieu_naissance }}</div>
            </td>



        </tr>
        <tr>
            <td colspan="3">
                <strong>Diplome de base:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->diplome_de_base .' | '.$demandesBourseRussie->serie_ou_filiere }}</div>
            </td>
            <td colspan="3">
                <strong>Diplome de base (Année | Moy | Mention ) :</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->annee_obtention_bac.' | '.$demandesBourseRussie->moyenne_bac.' | '.$demandesBourseRussie->mention }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>Niveau & Filière sollicité:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->niveau_sollicite .' | '.$demandesBourseRussie->filiere_choisi }}</div>
            </td>


        </tr>
        <tr>
            <td> <strong>Status Bourse:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->status_bourse }}</div>
            </td>
            <td colspan="3"><strong>Contact Whatsapp:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->contact_whatsapp }}</div>
            </td>
            <td colspan="2"><strong>Contact Parent:</strong>
                <div class='btn-style'>{{ $demandesBourseRussie->contact_parent }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="6">

                @forelse (App\Models\PieceJointeRussie::all() as $pj)
                    {{-- @forelse ($demandesBourseRussie->pieceJointes() as $pj) --}}
                    @php
                        $assocPJdemande = $demandesBourseRussie->pjID($pj->id)->first() ?? null;
                        // $lien_doc = $assocPJdemande == null ? null : $assocPJdemande->where('user_id', $demandesBourseRussie->id)->first();
                    @endphp


                        @if ($assocPJdemande == null)

                            <div class="form-group">
                                <div class="d-flex align-items-middle">

                                    <i class="fa fa-fw fa-close"
                                        style="color: red; font-size:20px; margin-right: 10px"></i>

                                    {{ Form::label( $pj->nom_pj) }}

                                </div>
                            </div>
                        @else

                            <div class="form-group">
                                <div class="d-flex align-items-middle">


                                    <i class="fa fa-fw fa-check"
                                        style="color: green; font-size:20px; margin-right: 10px"></i>

                                    {{ Form::label($pj->nom_pj) }}

                                </div>
                            </div>
                        @endif
@empty
                        @endforelse

                    {{-- @php
                        $tab = [
                            ['name' => 'url_diplome_ou_bac', 'label' => 'copie légalisées du diplôme ou de l’attestation de réussite du baccalauréat '],
                            ['name' => 'url_releve_note_bac', 'label' => 'copie légalisées du relevé de notes du baccalauréat'],
                            ['name' => 'url_certificat_nationalite', 'label' => 'copies légalisées du certificat de nationalité '],
                            ['name' => 'url_passport_ou_cni', 'label' => 'copies légalisées des trois (03) premières pages du passeport ou Carte Nationale d’Identité'],
                            ['name' => 'url_certificat_medical', 'label' => 'L’original d’un certificat médical délivré par les services de la santé publique attestant l’aptitude physique du candidat et certifiant qu’il est vacciné et n’est atteint d’aucune maladie contagieuse ou aiguë, ou porteur d’une pandémie notamment la tuberculose (le candidat pouvant être astreint à une contre visite médicale dès son arrivée au Maroc) '],
                            ['name' => 'url_photo_identite', 'label' => 'photos d’identité récentes'],
                            ['name' => 'url_quittance', 'label' => 'quittance délivrée par le Trésor Public après le payement sur le compte BJ6600100100000010443115-DBSU des frais d’étude de dossier qui s’élèvent à cinq mille (5000 francs CFA)'],
                            ['name' => 'url_test_vih', 'label' => 'L’original du test VIH'],

                            ['name' => 'url_acte_de_naissance', 'label' => 'copie légalisées de l’extrait d’acte de naissance'],
                            ['name' => 'url_engagement', 'label' => 'Un engagement sur l’honneur à retirer à la DBAU'],
                        ];
                    @endphp
                    <strong>Pièces jointes fourni :</strong>

                    @foreach ($tab as $el)
                        <div class="col-12 mt-3 mb-3">

                            @if ($demandesBourseRussie[$el['name']] != '')
                                <div class="form-group">
                                    <div class="d-flex align-items-middle">


                                        <i class="fa fa-fw fa-check"
                                            style="color: green; font-size:20px; margin-right: 10px"></i>

                                        {{ Form::label($el['label']) }}

                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <div class="d-flex align-items-middle">

                                        <i class="fa fa-fw fa-close"
                                            style="color: red; font-size:20px; margin-right: 10px"></i>

                                        {{ Form::label($el['label']) }}

                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach --}}
            </td>

        </tr>
    </table>
    <div style="text-align: end ; margin-top:15px; width: 100%; float:right;">
        <label for=""> <strong>Demande émise le : </strong> <br>
            {{ \Carbon\Carbon::parse($demandesBourseRussie->created_at)->translatedFormat('d F Y à H\hi') }}</label>
        <br>
        <label for=""> <strong> Imprimée le :</strong> <br>
            {{ \Carbon\Carbon::parse(date('d-m-Y'))->translatedFormat('d F Y ') }}

    </div>



</body>

</html>
