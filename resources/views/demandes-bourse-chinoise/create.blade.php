@extends('layouts.app')

@section('titre')
    Nouvelle Demandes Bourse Chinoise
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Nouvelle Demandes Bourse Chinoise</span>
                          <div class="float-right">
                                <a href="{{ route('demandes-bourse-chinoise.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('demandes-bourse-chinoise.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('demandes-bourse-chinoise.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
