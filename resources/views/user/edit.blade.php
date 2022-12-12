@extends('layouts.app')


@section('titre')
    Mettre à jour Profile
@endsection

@section('sous-titre')
    Modification
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Profile</span>

                        <div class="float-right">
                            <a class="btn btn-primary back-btn"> Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('utilisateur.update', $user->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                        <div class="row">
                            @php
                                $tab = [['name' => 'npi_url', 'label' => 'CIP Scanné au format PDF']];
                            @endphp

                            {{-- @foreach ($tab as $el)
                                <div class="col-12 mt-3 mb-3">

                                    @if ($user[$el['name']] != '')
                                        <div class="form-group">
                                            <div class="d-flex align-items-middle">
                                                <i class="fa fa-fw fa-check"
                                                    style="color: green; font-size:20px; margin-right: 10px"></i>

                                                {{ Form::label($el['label']) }}

                                            </div>
                                            <div class="d-flex">

                                                <a href="{{ Storage::url($user[$el['name']]) }}" target="_blank">
                                                    <button class="btn btn-info text-white" style="pointer-events: none"><i
                                                            class="fa fa-fw fa-eye"></i>
                                                        <strong>Voir</strong></button></a>
                                                <form method="POST" action="{{ route('utilisateur.update', $user->id) }}"
                                                    role="form" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}

                                                    @csrf
                                                    <input type="text" name="delete" value="oui" class="hide">
                                                    <input type="text" name="delete_val" value="{{ $el['name'] }}"
                                                        class="hide">
                                                    <button class="btn btn-danger mx-3 text-white" type="submit"><i
                                                            class="fa fa-fw fa-trash"></i><strong>Supprimer</strong>
                                                    </button>
                                                </form>
                                            </div>
                                            {!! $errors->first($el['name'], '<div class="alert alert-danger mt-2">:message</div>') !!}

                                            <div class="form-group">
                                                {{ Form::text($el['name'], $user[$el['name']], ['class' => 'form-control ' . ($errors->has('url_diplome_ou_bac') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            {{ Form::label($el['label']) }}
                                            {{ Form::file($el['name'], ['accept' => 'application/pdf', 'class' => 'form-control form-file is-invalid' . ($errors->has('url_diplome_ou_bac') ? ' is-invalid' : ''), 'placeholder' => 'Url Diplome Ou Bac']) }}
                                            <div class="invalid-feedback">Choisissez le fichier (Taille Maximal : 2 Mo)
                                            </div>
                                            {!! $errors->first($el['name'], '<div class="alert alert-danger mt-2">:message</div>') !!}
                                        </div>
                                    @endif

                                </div>
                            @endforeach --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
