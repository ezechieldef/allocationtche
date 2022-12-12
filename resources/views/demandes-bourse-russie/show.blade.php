@extends('layouts.app')

@section('titre')
    Détail Demandes Bourse Russe
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
                            <span class="card-title">Détail Demandes Bourse Russe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark " href="{{ route('demandes-bourse-russie.index') }}">
                                Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-2 col-12 my-2">
                                <strong>Code </strong>
                                <input type="text" value="{{ $demandesBourseRussie->code }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>NPI:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->NPI }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Nom:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->nom }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Prenoms:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->prenoms }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Date Naissance:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->date_naissance }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Lieu Naissance:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->lieu_naissance }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Sexe:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->sexe }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Serie / Filiere:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->serie_ou_filiere }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Annee Obtention du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->annee_obtention_bac }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Moyenne du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->moyenne_bac }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Mention du diplome de base:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->mention }}" class="form-control"
                                    readonly />
                            </div>
                            <div class="col-md-5 col-12 my-2">
                                <strong>Niveau & Filiere sollicité:</strong>
                                <input type="text"
                                    value="{{ $demandesBourseRussie->niveau_sollicite . ' | ' . $demandesBourseRussie->filiere_choisi }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-2 col-12 my-2">
                                <strong>Status Bourse:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->status_bourse }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Contact Whatsapp:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->contact_whatsapp }}"
                                    class="form-control" readonly />
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Contact Parent:</strong>
                                <input type="text" value="{{ $demandesBourseRussie->contact_parent }}"
                                    class="form-control" readonly />
                            </div>

                        </div>

                        @include('demandes-bourse-russie.piece_jointe_form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
