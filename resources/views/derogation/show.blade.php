@extends('layouts.app')

@section('titre')
    {{ $derogation->name ?? 'Détail Derogation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Derogation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('derogations.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Matricule:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->Matricule }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Nometudiant:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->NomEtudiant }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Prenometudiant:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->PrenomEtudiant }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Datenaissanceetudiant:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->DateNaissanceEtudiant }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Lieunaissanceetudiant:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->LieuNaissanceEtudiant }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Sexeetudiant:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->SexeEtudiant }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Nationalite:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->Nationalite }}">
                                </div>
                            </div>

                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Universite:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->CodeUniversite }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Etablissement:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->CodeEtablissement }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Filiere:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->CodeFiliere }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Année Etude:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->CodeAnneeEtude }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <div class="">
                                    <strong>Statutallocataire:</strong>
                                    <input type="text" readonly class="form-control" value="{{ $derogation->StatutAllocataire }}">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
