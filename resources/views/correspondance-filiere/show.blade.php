@extends('layouts.app')

@section('template_title')
    {{ $correspondanceFiliere->name ?? 'Show Correspondance Filiere' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Correspondance Filiere</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('correspondance-filiere.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Champ1:</strong>
                            {{ $correspondanceFiliere->champ1 }}
                        </div>
                        <div class="form-group">
                            <strong>Champ2:</strong>
                            {{ $correspondanceFiliere->champ2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
