@extends('layouts.app')

@section('template_title')
    Correspondance Temporaire
@endsection
@section('content')
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
                        <form action="/correspondance-temporaire-sel" method="post">
                            @csrf
                            <table class="table table-striped table-hover " id="mytable">
                                <thead class="thead">
                                    <tr>
                                        <th>
                                            <i class="fa fa-check text-success"></i>
                                        </th>
                                        <th>ID</th>
                                        <th>Université</th>
                                        <th>Etablissement</th>
                                        <th>Filiere</th>
                                        <th>Correspond à (Proposition)</th>
                                        <th>
                                            <i class="fa fa-close text-danger"></i>
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prop_list as $correspondanceFiliere)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="valider[]"
                                                    value="{{ $correspondanceFiliere->id }}">
                                            </td>
                                            <td>{{ $correspondanceFiliere->id }}</td>
                                            <td>{{ $correspondanceFiliere->filiere1()->first()->etablissement()->first()->universite()->first()->CodeUniversite }}
                                            </td>
                                            <td>{{ $correspondanceFiliere->filiere1()->first()->etablissement()->first()->LibelleEtablissement }}
                                            </td>

                                            <td>{{ $correspondanceFiliere->filiere1()->first()->LibelleFiliere }}</td>
                                            <td>{{ $correspondanceFiliere->nouveau }}</td>
                                            <td>
                                                <input type="checkbox" name="rejeter[]"
                                                    value="{{ $correspondanceFiliere->id }}">
                                            </td>
                                            {{-- <td>
                                        @foreach ($correspondanceFiliere->synonymes() as $syn)
                                        <div class="btn btn-light shadow-sm">
                                            {{ $syn['CodeFiliere'] }}
                                        </div>
                                    @endforeach
                                    </td> --}}


                                            {{-- <td>
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
                                        </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="row">
                                <div class="col-md-12 col-12 text-center my-3">
                                    <button type="submit" class="btn btn-warning text-dark w-100 "> Valider Correspondance / Supprimer Proposition de correspondance </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
