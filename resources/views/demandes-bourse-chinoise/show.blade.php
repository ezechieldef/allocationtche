@extends('layouts.app')

@section('titre')
    Détail Demandes Bourse Chinoise
@endsection

@section('content')
    {{-- <div class="text-center">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_3anincg1.json" background="transparent"
        speed="1" style="height:500px;" loop autoplay>

    </lottie-player>
    <div class="h4">Formulaire de demande d'allocation non accessible pour le moment</div>

    <p> Maintenance en cours </p>
</div> --}}

    <section class="content container-fluid">
        <div class="alert alert-info">Avant de télécharger votre fiche, vérifier les informations saisies et téléverser les
            pièces jointes requise</div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Demandes Bourse Chinoise</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark " href="{{ route('demandes-bourse-chinoise.index') }}">
                                Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-2 col-12 my-2">
                                <strong>Code </strong>
                                <input type="text" value="{{ $demandesBourseChinoise->code }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>NPI:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->NPI }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Nom:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->nom }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Prenoms:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->prenoms }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Date Naissance:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->date_naissance }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Lieu Naissance:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->lieu_naissance }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Sexe:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->sexe }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Serie / Filiere:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->serie_ou_filiere }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Annee Obtention du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->annee_obtention_bac }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Moyenne du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->moyenne_bac }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Mention du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->mention }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-5 col-12 my-2">
                                <strong>Niveau & Filiere sollicité:</strong>
                                <input type="text"
                                    value="{{ $demandesBourseChinoise->niveau_sollicite . ' | ' . $demandesBourseChinoise->filiere_choisi }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Status Bourse:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->status_bourse }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Contact Whatsapp:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->contact_whatsapp }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Contact Parent:</strong>
                                <input type="text" value="{{ $demandesBourseChinoise->contact_parent }}"
                                    class="form-control" readonly />
                            </div>

                        </div>

                        @include('demandes-bourse-chinoise.piece_jointe_form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
