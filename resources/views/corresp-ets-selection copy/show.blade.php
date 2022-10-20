@extends('layouts.app')

@section('template_title')
    {{ $correspEtsSelection->name ?? 'Show Corresp Ets Selection' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Corresp Ets Selection</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('correspondance-ets-selection.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codeetablissement1:</strong>
                            {{ $correspEtsSelection->CodeEtablissement1 }}
                        </div>
                        <div class="form-group">
                            <strong>Etablissementselection:</strong>
                            {{ $correspEtsSelection->etablissementSelection }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
