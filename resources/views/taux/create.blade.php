@extends('layouts.app')

@section('titre')
    Créer Taux
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire Taux</span>
                        <div class="">
                            <a href="{{ route('taux.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                              Retour
                            </a>
                          </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('taux.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('taux.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
