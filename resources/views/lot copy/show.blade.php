@extends('layouts.app')

@section('titre')
    Détail Lot : {{ $lot->id }}
@endsection

@section('content')
<div class="container">

    <table class="table">
        <thead>
            <th>Filiere</th>
            <th>Année d'Étude</th>
            <th>Nature Allocation</th>
            <th>Effectif</th>
        </thead>
        <tbody>
            @foreach (DB::select("select E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation, count(E.CodeEtudiant) as effectif from
             demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant
             GROUP BY E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation", [])

            as $list)
                <tr>
                    <td>{{ $list->CodeFiliere }}</td>
                    <td>{{  $list->CodeAnneeEtude }}</td>
                    <td>{{  $list->CodeNatureAllocation }}</td>
                    <td>{{  $list->effectif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Lot</span>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-light btn-outline-primary mx-2">Exporter PDF</button>
                            <button class="btn btn-light mx-2">Ajouter au lot</button>
                            <a class="btn btn-warning text-dark text-bold" href="{{ route('lots.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <strong>Libele:</strong>

                                    <input type="text" class="form-control" readonly value="{{ $lot->libele }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <strong>User Id:</strong>
                                    <input type="text" class="form-control" readonly
                                        value="{{ \App\Models\User::find($lot->user_id)->email }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    <input type="text" class="form-control" readonly value="{{ $lot->status }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center ">Liste des Demandes inclus </div>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped">
                                <thead>
                                    <th>
                                        Code
                                    </th>
                                    <th>Matricule</th>
                                    <td>
                                        Nom & Prénoms
                                    </td>
                                    <th>Date Naiss.</th>
                                    <td>
                                        Type demande
                                    </td>
                                    <td>Année Acadé. / d'étu.</td>
                                    <td>Filiere</td>
                                    <td>Référence</td>
                                    <td>Situation Antérieur</td>
                                    <th>Actions</th>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
