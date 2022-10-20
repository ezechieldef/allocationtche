@extends('layouts.app')

@section('template_title')
    {{ $correspFilSelection->name ?? 'Show Corresp Fil Selection' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Corresp Fil Selection</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('correspondance-fil-selection.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codefiliere:</strong>
                            {{ $correspFilSelection->CodeFiliere }}
                        </div>
                        <div class="form-group">
                            <strong>Filiereselection:</strong>
                            {{ $correspFilSelection->filiereSelection }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
