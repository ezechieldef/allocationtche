@extends('layouts.app')

@section('template_title')
    {{ $correspondanceEtablissement->name ?? 'Show Correspondance Etablissement' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Correspondance Etablissement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('correspondance-etablissement.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Champ1:</strong>
                            {{ $correspondanceEtablissement->champ1 }}
                        </div>
                        <div class="form-group">
                            <strong>Champ2:</strong>
                            {{ $correspondanceEtablissement->champ2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
