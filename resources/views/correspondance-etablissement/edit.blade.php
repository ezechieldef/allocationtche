@extends('layouts.app')

@section('template_title')
    Update Correspondance Etablissement
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Correspondance Etablissement</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('correspondance-etablissement.update', $correspondanceEtablissement->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('correspondance-etablissement.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
