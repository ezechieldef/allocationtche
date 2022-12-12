@extends('layouts.app')
@section('titre')
    Détail d'une demande
@endsection


@section('content')
    <div class="card">
        <div class="card-header text-bold d-flex justify-content-between">Informations Actuelles

            <a href="/mes-demandes" class="btn btn-warning text-dark">Retour</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-12 my-2">
                    <label for="">Matricule</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->Matricule }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Nom</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->NomEtudiant }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">Prénoms</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->PrenomEtudiant }}">
                </div>
                <div class="col-md-1 col-12 my-2">
                    <label for="">Sexe : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->SexeEtudiant }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Date de Naissance : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->DateNaissanceEtudiant }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Lieu de Naissance : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->LieuNaissanceEtudiant }}">
                </div>

                <div class="col-md-3 col-12 my-2">
                    <label for="">Année Académique : </label>
                    <input type="text" readonly class="form-control"
                        value="{{ \App\Models\AnneeAcademique::find($demLier->CodeAnneeAcademique)->LibelleAnneeAcademique }}">
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">Université : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeUniversite }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Etablissement : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeEtablissement }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">Filière : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeFiliere }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Année d'Étude : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeAnneeEtude }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Banque </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeBanque }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">RIB : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->RIB }}">
                    <label class="my-2">
                        @if ($demLier->RIB_valie == 'oui')
                            <i class="fa fa-check text-success mx-2"></i>Ce RIB a déjà été validé par votre Banque en votre
                            nom, vous ne pourrez plus le modifier
                        @else
                            {{-- <i class="fa fa-close text-danger mx-2"></i>Ce RIB n'a pas encore été validé par votre Banque en
                            votre nom --}}
                        @endif
                    </label>
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">Téléphone : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->Telephone }}">
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">NPI : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->NPI }}">
                </div>
            </div>
        </div>
    </div>
@endsection
