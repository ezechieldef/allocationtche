@extends('layouts.app')
@section('titre')
    Faire une demande d'Allocation
@endsection
@section('sous-titre')
    Direction des Bourses et Aides Universitaire
@endsection
@section('content')
    <form action="nouvelle-demande-allocation" method="post">
        <div class=" ">
            {{-- {{ Session::get('errorsDem') }} --}}
            @if (count(Session::get('errorsDem') ?? []) != 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach (Session::get('errorsDem') as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @php
                Session::forget('errorsDem');
            @endphp
            <div class="alert alert-info">
                <strong>Information :</strong> Les étudiants sélectionés sur la base des concours doivent utiliser le numéro de table des concours
            </div>
            <div class="card">
                <div class="card-header text-center text-white">
                    <h4 class="text-white">Formulaire Bourse dans les UPB</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-6 col-12 my-2">
                            <label for="">Université</label>
                            {{ Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
                        </div>

                        <div class="col-md-6 col-12 my-2">
                            {{ Form::label('Matricule') }}
                            {{ Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required']) }}
                            {!! $errors->first('Matricule', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="col-md-4 col-12 my-2">
                            {{ Form::label('Date_Naissance') }}
                            {{ Form::date('DateNaissanceEtudiant', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Datenaissanceetudiant']) }}
                            {!! $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-4 col-12 my-2">
                            <label for="">Diplome de base</label>
                            {{ Form::select('DipDeBase', App\Models\DipDeBase::pluck('LibelleDipdeBase', 'CodeDipdeBase'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
                        </div>
                        {{-- <div class="col-12">
                    <label for="">Année d'Obtention</label>
                    @php
                        $tab = [];
                        for ($i = date('Y'); $i > date('Y') - 20; $i--) {
                            $tab[$i] = $i;
                        }
                    @endphp
                    {{ Form::select('AnneeObtention', $tab, null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
                </div> --}}

                        <div class="col-md-4 col-12 my-2">
                            {{ Form::label('Numero De Table') }}
                            {{ Form::text('NumeroDeTable', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('NumeroDeTable') ? ' is-invalid' : ''), 'placeholder' => 'Numero De Table']) }}
                            {!! $errors->first('NumeroDeTable', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                    </div>
                    <div class="text-center">
                        <button class="btn btn-success my-3 px-5 text-white text-bold">Soumettre</button>
                    </div>
                </div>
            </div>



        </div>
    </form>
@endsection
