@extends('layouts.app')

@section('titre')
     Détail Demandes Bourse Russie
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Demandes Bourse Russie</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('demandes-bourse-russie.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group my-2">
                            <strong>User Id:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->user_id }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Code:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->code }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Npi:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->NPI }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Nom:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->nom }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Prenoms:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->prenoms }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Date Naissance:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->date_naissance }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Lieu Naissance:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->lieu_naissance }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Sexe:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->sexe }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Diplome De Base:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->diplome_de_base }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Serie Ou Filiere:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->serie_ou_filiere }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Annee Obtention Bac:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->annee_obtention_bac }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Moyenne Bac:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->moyenne_bac }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Mention:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->mention }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Niveau Sollicite:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->niveau_sollicite }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Filiere Choisi:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->filiere_choisi }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Status Bourse:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->status_bourse }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Contact Whatsapp:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->contact_whatsapp }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Contact Parent:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->contact_parent }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Imprime:</strong>
                            <input type="text" value="{{ $demandesBourseRussie->imprime }}" class="form-control" readonly/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
