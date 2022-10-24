@extends('layouts.app')

@section('titre')
     Détail Motifs Rejet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Motifs Rejet</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('motifs_rejets.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group my-2">
                            <strong>Libele:</strong>
                            <input type="text" value="{{ $motifsRejet->libele }}" class="form-control" readonly/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
