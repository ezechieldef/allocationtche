@extends('layouts.app')

@section('template_title')
    {{ $taux->name ?? 'Show Taux' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Taux</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('taux.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codetaux:</strong>
                            {{ $taux->CodeTaux }}
                        </div>
                        <div class="form-group">
                            <strong>Codefiliere:</strong>
                            {{ $taux->CodeFiliere }}
                        </div>
                        <div class="form-group">
                            <strong>Codeanneeetude:</strong>
                            {{ $taux->CodeAnneeEtude }}
                        </div>
                        <div class="form-group">
                            <strong>Codenatureallocation:</strong>
                            {{ $taux->CodeNatureAllocation }}
                        </div>
                        <div class="form-group">
                            <strong>Codeanneeacademique:</strong>
                            {{ $taux->CodeAnneeAcademique }}
                        </div>
                        <div class="form-group">
                            <strong>Tauxallocation:</strong>
                            {{ $taux->TauxAllocation }}
                        </div>
                        <div class="form-group">
                            <strong>Accessoireallocation:</strong>
                            {{ $taux->AccessoireAllocation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
