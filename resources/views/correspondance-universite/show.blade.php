@extends('layouts.app')

@section('template_title')
    {{ $correspondanceUniversite->name ?? 'Show Correspondance Universite' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Correspondance Universite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('correspondance-universite.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Champ1:</strong>
                            {{ $correspondanceUniversite->champ1 }}
                        </div>
                        <div class="form-group">
                            <strong>Champ2:</strong>
                            {{ $correspondanceUniversite->champ2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
