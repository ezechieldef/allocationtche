@extends('layouts.app')

@section('titre')
    Créer PV
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Créer un PV</span>
                        <div class="float-right">
                            <a href="{{ route('pv.index') }}" class="btn btn-warning text-dark text-bold btn-sm float-right"  data-placement="left">
                              Retour
                            </a>
                          </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pv.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pv.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
