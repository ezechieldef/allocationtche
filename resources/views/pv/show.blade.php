@extends('layouts.app')

@section('template_title')
    Détail PV
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail PV</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark" href="{{ route('pv.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Codepv:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->CodePV }}">
                        </div>
                        <div class="form-group">
                            <strong>Reference PV:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->Reference_PV }}">
                        </div>
                        <div class="form-group">
                            <strong>Datedebutsession:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->DateDebutSession }}">
                        </div>

                        <div class="form-group">
                            <strong>Datefinsession:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->DateFinSession }}">
                        </div>
                        <div class="form-group">
                            <strong>Anneecivile:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->AnneeCivile }}">
                        </div>
                        <div class="form-group">
                            <strong>Notebaspage:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->NoteBasPage }}">
                        </div>
                        <div class="form-group">
                            <strong>Datetransmissionliste:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->DateTransmissionListe }}">
                        </div>
                        <div class="form-group">
                            <strong>Reflettretransmisionliste:</strong>
                            <input type="text" readonly class="form-control" value="{{ $pv->RefLettreTransmisionListe }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
