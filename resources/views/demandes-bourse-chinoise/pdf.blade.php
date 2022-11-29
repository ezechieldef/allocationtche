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

        <h3 class="mb-3"> Fiche d'inscription : Bourse Chinoise </h4>
    </center>


    <table style="width: 100%" border="1px dashed grey">
        <tr>
            <td>
                <strong>Code Demande</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseChinoise->code }}</div>
                </div>
            </td>
            <td colspan="2">
                <strong>Nom</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseChinoise->nom }}</div>
                </div>
            </td>
            <td colspan="3">
                <strong>Prénoms</strong>
                <div class="btn-style">
                    <div class='btn-style'>{{ $demandesBourseChinoise->prenoms }}</div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Date Naissance:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->date_naissance }}</div>
            </td>
            <td>
                <strong>Lieu Naissance:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->lieu_naissance }}</div>
            </td>

            <td>
                <strong>Sexe:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->sexe }}</div>
            </td>
            <td>
                <strong>Diplome de base:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->diplome_de_base .' | '.$demandesBourseChinoise->serie_ou_filiere }}</div>
            </td>
            <td>
                <strong>Baccalauréat :</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->annee_obtention_bac.' | '.$demandesBourseChinoise->moyenne_bac.' | '.$demandesBourseChinoise->mention }}</div>
            </td>

        </tr>
        <tr>
            <td colspan="2">
                <strong>Filière choisi:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->filiere_choisi }}</div>
            </td>

            <td> <strong>Status Bourse:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->status_bourse }}</div>
            </td>
            <td><strong>Contact Whatsapp:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->contact_whatsapp }}</div>
            </td>
            <td><strong>Contact Parent:</strong>
                <div class='btn-style'>{{ $demandesBourseChinoise->contact_parent }}</div>
            </td>
        </tr>
        <tr>
            <td colspan="5">

                @forelse (App\Models\PieceJointeChine::all() as $pj)
                    {{-- @forelse ($demandesBourseChinoise->pieceJointes() as $pj) --}}
                    @php
                        $assocPJdemande = $demandesBourseChinoise->pjID($pj->id)->first() ?? null;
                        // $lien_doc = $assocPJdemande == null ? null : $assocPJdemande->where('user_id', $demandesBourseChinoise->id)->first();
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

                            @if ($demandesBourseChinoise[$el['name']] != '')
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
        <label for=""> <strong>Demande émis le : </strong> <br>
            {{ \Carbon\Carbon::parse($demandesBourseChinoise->created_at)->translatedFormat('d F Y à H\hi') }}</label>
        <br>
        <label for=""> <strong> Imprimé le :</strong> <br>
            {{ \Carbon\Carbon::parse(date('d-m-Y'))->translatedFormat('d F Y ') }} par
            {{ Auth::user()->name }}</label> <br>
        <label for=""> <strong> Référence : </strong>
            D22-ISSI{{ $demandesBourseChinoise->id }}</label>
    </div>



</body>

</html>
