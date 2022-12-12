@extends('layouts.app')
@section('titre')
    Faire une demande d'Allocation
@endsection
@section('content')
    @php
        $reg = \App\Models\ReglageDeBase::first();
        $today = strtotime(date('Y-m-d'));
        $ouv = strtotime($reg->DateOuverture);
        $ferm = strtotime($reg->DateFermeture);
    @endphp
    {{-- {{ $ouv }} <br> {{ $today }} <br> {{ $ferm }} --}}
    @if ($ouv > $today || $ferm < $today)
        {{-- @if (1 == 1) --}}
        <div class="text-center">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_3anincg1.json" background="transparent"
                speed="1" style="height:500px;" loop autoplay>

            </lottie-player>
            <div class="h4">Formulaire de demande d'allocation non accessible pour le moment</div>

            <p> Disponible du <strong>{{ $reg->DateOuverture }}</strong> au <strong>{{ $reg->DateFermeture }}</strong></p>
        </div>
    @else
    @if ($deja)
    <div class="text-center">
        <div class="h5">Vous n'avez pas encore fini le processus ! </div>
    </div>
    <div class="card">
        <div class="card-header">
            Information de l'étudiant
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-2 col-12 my-2">
                    <label for="">Matricule</label>
                    <input type="text" readonly class="form-control" value="{{ $demTemp[0]->Matricule }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Nom</label>
                    <input type="text" readonly class="form-control" value="{{ $demTemp[0]->NomEtudiant }}">
                </div>
                <div class="col-md-6 col-12 my-2">
                    <label for="">Prénoms</label>
                    <input type="text" readonly class="form-control" value="{{ $demTemp[0]->PrenomEtudiant }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Date de Naissance : </label>
                    <input type="text" readonly class="form-control"
                        value="{{ $demTemp[0]->DateNaissanceEtudiant }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Lieu de Naissance : </label>
                    <input type="text" readonly class="form-control"
                        value="{{ $demTemp[0]->LieuNaissanceEtudiant }}">
                </div>
                <div class="col-md-1 col-12 my-2">
                    <label for="">Sexe : </label>
                    <input type="text" readonly class="form-control" value="{{ $demTemp[0]->SexeEtudiant }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Université : </label>
                    <input type="text" readonly class="form-control" value="{{ $demTemp[0]->CodeUniversite }}">
                </div>
            </div>
            <div class="text-center mt-5 mb-2 card-header rounded "> <strong>Demande à faire </strong> </div>
            <div class="table-responsive">
                <table class="table text-center " id="mytable">
                    <thead>
                        <th></th>
                        <th>Année Académique</th>
                        <th>Université</th>
                        <th>Etablissement</th>
                        <th>Filière</th>
                        <th>Année d'Étude</th>
                        <th>Type de demande</th>

                    </thead>
                    <tbody>
                        @foreach ($demTemp as $dem)
                            <tr class="odd dt-hasChild parent text-center">
                                <td>
                                    <i class="fa fa-check text-success"></i>
                                </td>
                                <td>{{ \App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique)->LibelleAnneeAcademique }}
                                </td>
                                <td>{{ $dem->CodeUniversite }}</td>
                                <td>{{ $dem->CodeEtablissement }}</td>
                                <td>{{ $dem->CodeFiliere }}</td>
                                <td>{{ $dem->CodeAnneeEtude }}</td>
                                <td>{{ $dem->CodeTypeDemande }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center text-bold text-danger">
<div class="row">
    <div class="col-6">
        <a href="/step2" class="btn btn-success text-white w-100"> Continuer Pour finaliser </a>

    </div>
    <div class="col-6">

        <a href="/step2/cancel" class="btn btn-outline-danger fw-bold w-100"> Annuler (Je ne suis pas le titulaire de ces informations ) </a>
    </div>
</div>

            </div>
        </div>
    </div>
    @else

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

            @if(\App\Models\DemandeAllocationUPB::where('UtilisateurDemande',Auth::user()->id)->get()->count()!=0)
                <div class="alert alert-warning">
                    <strong>Information :</strong> Vous avez déjà une demande . 
                    <a href="/mes-demandes">cliquez ici pour suivre votre demande</a>
                </div>
            @endif

                <div class="alert alert-info">
                    <strong>Information :</strong> Les étudiants admis aux concours doivent utiliser le
                    numéro de table des concours.
                </div>
                <div class="card">
                    <div class="card-header text-center text-white">
                        <h4 class="text-white">Formulaire Bourse dans les UPB</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-md-6 col-12 my-2">
                                <strong> <label for="">Université</label></strong>
                                {{ Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
                            </div>

                            <div class="col-md-6 col-12 my-2">
                                <strong> {{ Form::label('Matricule') }}</strong>
                                {{ Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required']) }}
                                {!! $errors->first('Matricule', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="col-md-4 col-12 my-2">
                                <strong><label for="DateNaissanceEtudiant">Date de Naissance</label></strong>
                                {{ Form::date('DateNaissanceEtudiant', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Datenaissanceetudiant']) }}
                                {!! $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong><label for="">Diplome de base</label></strong>
                                {{ Form::select('DipDeBase', ['BAC' => 'Baccalauréat', 'Autre' => 'Autres'], null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
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

                                <strong>
                                    <label for="NumeroDeTable">Numero de table</label></strong>
                                {{ Form::text('NumeroDeTable', null, ['required' => 'required', 'class' => 'form-control' . ($errors->has('NumeroDeTable') ? ' is-invalid' : ''), 'placeholder' => 'Numero De Table']) }}
                                {!! $errors->first('NumeroDeTable', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-success my-3 px-5 text-white text-bold">Valider</button>
                        </div>
                    </div>
                </div>



            </div>
        </form>
        @endif

    @endif
@endsection
