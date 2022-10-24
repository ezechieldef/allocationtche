@extends('layouts.app')

@section('template_title')
    {{ $pv->name ?? 'Show Pv' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pv</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pv.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codepv:</strong>
                            {{ $pv->CodePV }}
                        </div>
                        <div class="form-group">
                            <strong>Reference Pv:</strong>
                            {{ $pv->Reference_PV }}
                        </div>
                        <div class="form-group">
                            <strong>Datedebutsession:</strong>
                            {{ $pv->DateDebutSession }}
                        </div>
                        <div class="form-group">
                            <strong>Session:</strong>
                            {{ $pv->Session }}
                        </div>
                        <div class="form-group">
                            <strong>Datefinsession:</strong>
                            {{ $pv->DateFinSession }}
                        </div>
                        <div class="form-group">
                            <strong>Anneecivile:</strong>
                            {{ $pv->AnneeCivile }}
                        </div>
                        <div class="form-group">
                            <strong>Notebaspage:</strong>
                            {{ $pv->NoteBasPage }}
                        </div>
                        <div class="form-group">
                            <strong>Datetransmissionliste:</strong>
                            {{ $pv->DateTransmissionListe }}
                        </div>
                        <div class="form-group">
                            <strong>Reflettretransmisionliste:</strong>
                            {{ $pv->RefLettreTransmisionListe }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
