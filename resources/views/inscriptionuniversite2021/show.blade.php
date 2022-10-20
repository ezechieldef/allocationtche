@extends('layouts.app')

@section('template_title')
    {{ $inscriptionuniversite2021->name ?? 'Show Inscriptionuniversite2021' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inscriptionuniversite2021</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inscriptionuniversite2021s.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Matricule:</strong>
                            {{ $inscriptionuniversite2021->Matricule }}
                        </div>
                        <div class="form-group">
                            <strong>Nometudiant:</strong>
                            {{ $inscriptionuniversite2021->NomEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Prenometudiant:</strong>
                            {{ $inscriptionuniversite2021->PrenomEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Datenaissanceetudiant:</strong>
                            {{ $inscriptionuniversite2021->DateNaissanceEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Lieunaissanceetudiant:</strong>
                            {{ $inscriptionuniversite2021->LieuNaissanceEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Sexeetudiant:</strong>
                            {{ $inscriptionuniversite2021->SexeEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Nationalite:</strong>
                            {{ $inscriptionuniversite2021->Nationalite }}
                        </div>
                        <div class="form-group">
                            <strong>Adresseetudiant:</strong>
                            {{ $inscriptionuniversite2021->AdresseEtudiant }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $inscriptionuniversite2021->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Telephone1:</strong>
                            {{ $inscriptionuniversite2021->Telephone1 }}
                        </div>
                        <div class="form-group">
                            <strong>Libellecourtuniversite:</strong>
                            {{ $inscriptionuniversite2021->LibelleCourtUniversite }}
                        </div>
                        <div class="form-group">
                            <strong>Codeetablissement:</strong>
                            {{ $inscriptionuniversite2021->CodeEtablissement }}
                        </div>
                        <div class="form-group">
                            <strong>Codefiliere:</strong>
                            {{ $inscriptionuniversite2021->CodeFiliere }}
                        </div>
                        <div class="form-group">
                            <strong>Codeanneeetude:</strong>
                            {{ $inscriptionuniversite2021->CodeAnneeEtude }}
                        </div>
                        <div class="form-group">
                            <strong>Inscription:</strong>
                            {{ $inscriptionuniversite2021->Inscription }}
                        </div>
                        <div class="form-group">
                            <strong>Statutallocataire:</strong>
                            {{ $inscriptionuniversite2021->StatutAllocataire }}
                        </div>
                        <div class="form-group">
                            <strong>Codeetudiant:</strong>
                            {{ $inscriptionuniversite2021->codeEtudiant }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
