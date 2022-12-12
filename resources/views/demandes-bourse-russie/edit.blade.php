@extends('layouts.app')

@section('titre')
    Modifier Demandes Bourse Russie
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire Modification Demandes Bourse Russie</span>
                        <div class="float-right">
                                <a href="{{ route('demandes-bourse-russie.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('demandes-bourse-russie.update', $demandesBourseRussie->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('demandes-bourse-russie.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
