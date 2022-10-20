@extends('layouts.app')

@section('template_title')
    {{ $universite->name ?? 'Show Universite' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Universite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('universites.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codeuniversite:</strong>
                            {{ $universite->CodeUniversite }}
                        </div>
                        <div class="form-group">
                            <strong>Libellelonguniversite:</strong>
                            {{ $universite->LibelleLongUniversite }}
                        </div>
                        <div class="form-group">
                            <strong>Universiteactif:</strong>
                            {{ $universite->UniversiteActif }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
