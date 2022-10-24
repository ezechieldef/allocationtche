@extends('layouts.app')

@section('titre')
    Modifier Motifs Rejet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire Modification Motifs Rejet</span>
                        <div class="float-right">
                                <a href="{{ route('motifs_rejets.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('motifs_rejets.update', $motifsRejet->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('motifs-rejet.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
