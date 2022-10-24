@extends('layouts.app')
@section('titre')
    Consulter
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Formulaire </div>
        <div class="card-body">
            <form action="/consulter" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 my-2">
                        <label for="">Université</label>
                        {{ Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --']) }}
                    </div>

                    <div class="col-md-6 col-12 my-2">
                        {{ Form::label('Matricule') }}
                        {{ Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required']) }}
                        {!! $errors->first('Matricule', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success my-3 px-5 text-white text-bold ">Soumettre</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @if (!is_null($list ?? null))
        @if (count($list) == 0)
            <div class="text-center my-5 py-5">
                <i class="fa fa-close text-danger" style="font-size: 60px"></i>
                <h2>Aucune données trouvé pour ces informations</h2>

            </div>
        @else
            <div class="card">
                <div class="card-header">Résultats</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <th></th>
                                <th>Matricule</th>
                                <th>Nom & Prénoms</th>
                                <th>Date Naiss.</th>
                                <th>Filière</th>
                                <th>Année Aca. / Niveau </th>
                                <th>Nature </th>
                                <th>Banque </th>
                                <th>RIB </th>
                            </thead>
                            <tbody>
                                @foreach ($list as $dem)
                                    {{-- {{ $dem }} --}}
                                    <tr>
                                        <td>
                                            @if ($dem->CodeTypeDemande == '')
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                                <i class="fa fa-close text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-dark">{{ $dem->Matricule }}</td>
                                        <td>{{ $dem->NomEtudiant . ' ' . $dem->PrenomEtudiant }}</td>
                                        <td class=""> {{ $dem->DateNaissanceEtudiant }}</td>
                                        <td><strong class="text-dark"> {{ $dem->CodeFiliere }}</strong></td>
                                        <td> {{ \App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique ?? $dem->Annee)->LibelleAnneeAcademique }}
                                            / {{ $dem->CodeAnneeEtude }}</td>
                                        <td> {{ $dem->CodeNatureAllocation ?? $dem->StatutAllocataire }}</td>
                                        <td> {{ $dem->CodeBanque }}</td>
                                        <td> {{ $dem->RIB }}</td>


                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endif

    @endif
@endsection
