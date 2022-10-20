@extends('layouts.app')

@section('titre')
    Mofier Lot {{ $lot->id }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire de modification Lot</span>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark text-bold" href="{{ route('lots.index') }}"> Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lots.update', $lot->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lot.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
