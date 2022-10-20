@extends('layouts.app')

@section('template_title')
    Correspondance Universite
@endsection

@section('content')
    <div class="container-fluid">
        <p>
            <button class="btn btn-success text-white text-bold w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Nouvelle Correspondance
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card ">
                <div class="card-header">
                    <span class="card-title">Formulaire Correspondance Université</span>
                </div>
                @php
                    $correspondanceUniversite = new App\Models\CorrespondanceUniversite();
                @endphp
                <div class="card-body">
                    <form method="POST" action="{{ route('correspondance-universite.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('correspondance-universite.form')

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
                                {{ __('Correspondance Universite') }}
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
										<th>Correspond à</th>
										<th>Synonymes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($correspondanceUniversites as $correspondanceUniversite)
                                        <tr>


											<td>{{ $correspondanceUniversite->universite1()->first()->LibelleLongUniversite }}</td>
											<td>{{ $correspondanceUniversite->universite2()->first()->LibelleLongUniversite }}</td>
											<td>

                                                {{-- @php
                                                    $var = new \App\Models\CorrespondanceCode();
                                                    $var->univSynonyme($correspondanceUniversite->champ1);
                                                @endphp
                                            @foreach ( $var->resultat as $syn )
                                                <div class="btn btn-light shadow-sm">
                                                    {{ $syn->CodeUniversite }}
                                                </div>
                                            @endforeach --}}
                                            @foreach ( $correspondanceUniversite->synonymes() as $syn )
                                                <div class="btn btn-light shadow-sm">
                                                    {{ $syn->CodeUniversite }}
                                                </div>
                                            @endforeach

                                            </td>

                                            <td>
                                                <form action="{{ route('correspondance-universite.destroy',$correspondanceUniversite->id) }}" method="POST">

                                                    <a class="btn btn-sm btn-success text-white show_confirm2" href="{{ route('correspondance-universite.edit',$correspondanceUniversite->id) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
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
