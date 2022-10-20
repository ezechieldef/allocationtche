@extends('layouts.app')

@section('template_title')
    Correspondance Filiere
@endsection

@section('content')
    <div class="container-fluid">
        <p>
            <button class="btn btn-success text-white text-bold w-100" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Nouvelle Correspondance
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card ">
                <div class="card-header">
                    <span class="card-title">Formulaire Correspondance Filiere</span>
                </div>
                @php
                    $correspondanceFiliere = new App\Models\CorrespondanceFiliere();
                @endphp
                <div class="card-body">
                    <form method="POST" action="{{ route('correspondance-filiere.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('correspondance-filiere.form')

                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Correspondance Filiere') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead class="thead">
                                    <tr>

                                        <th>Université</th>
                                        <th>Etablissement</th>
                                        <th>Filiere</th>
                                        <th>Correspond à</th>
                                        <th>Synonymes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($correspondanceFilieres as $correspondanceFiliere)
                                        <tr>


                                            <td>{{ $correspondanceFiliere->filiere1()->first()->etablissement()->first()->universite()->first()->LibelleLongUniversite }}
                                            </td>
                                            <td>{{ $correspondanceFiliere->filiere1()->first()->etablissement()->first()->LibelleEtablissement }}
                                            </td>

                                            <td>{{ $correspondanceFiliere->filiere1()->first()->LibelleFiliere }}</td>
                                            <td>{{ $correspondanceFiliere->filiere2()->first()->LibelleFiliere }}</td>
                                            <td>
                                                @foreach ($correspondanceFiliere->synonymes() as $syn)
                                                <div class="btn btn-light shadow-sm">
                                                    {{ $syn['CodeFiliere'] }}
                                                </div>
                                            @endforeach
                                            </td>



                                            <td>
                                                <form
                                                    action="{{ route('correspondance-filiere.destroy', $correspondanceFiliere->id) }}"
                                                    method="POST">

                                                    <a class="btn btn-sm btn-success text-white"
                                                        href="{{ route('correspondance-filiere.edit', $correspondanceFiliere->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i
                                                            class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
