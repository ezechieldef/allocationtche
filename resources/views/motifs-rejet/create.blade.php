@extends('layouts.app')

@section('titre')
    Créer Motifs Rejet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Créer Motifs Rejet</span>
                          <div class="float-right">
                                <a href="{{ route('motifs_rejets.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('motifs_rejets.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('motifs-rejet.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
