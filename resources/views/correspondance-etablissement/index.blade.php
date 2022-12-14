@extends('layouts.app')

@section('template_title')
    Correspondance Etablissement
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
                    <span class="card-title">Formulaire Correspondance Etablissement</span>
                </div>
                @php
                    $correspondanceEtablissement = new App\Models\CorrespondanceEtablissement();
                @endphp
                <div class="card-body">
                    <form method="POST" action="{{ route('correspondance-etablissement.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('correspondance-etablissement.form')

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
                                {{ __('Correspondance Etablissement') }}
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


                                        <th>Universit??</th>
                                        <th>Etablissement</th>
                                        <th>Correspond ??</th>
                                        <th>Synonymes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($correspondanceEtablissements as $correspondanceEtablissement)
                                        <tr>

                                            <td>{{ $correspondanceEtablissement->etablissement1()->first()->universite()->first()->LibelleLongUniversite }}
                                            </td>
                                            <td>{{ $correspondanceEtablissement->etablissement1()->first()->LibelleEtablissement }}
                                            </td>
                                            <td>{{ $correspondanceEtablissement->etablissement2()->first()->LibelleEtablissement }}
                                            </td>
                                            <td>
                                                @foreach ($correspondanceEtablissement->synonymes() as $syn)
                                                    <div class="btn btn-light shadow-sm">
                                                        {{ $syn['CodeEtablissement'] }}
                                                    </div>
                                                @endforeach
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('correspondance-etablissement.destroy', $correspondanceEtablissement->id) }}"
                                                    method="POST">

                                                    <a class="btn btn-sm btn-success text-white"
                                                        href="{{ route('correspondance-etablissement.edit', $correspondanceEtablissement->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
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
