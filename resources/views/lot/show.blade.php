@extends('layouts.app')

@section('titre')
    Détail Lot : {{ $lot->id }}
@endsection

@section('content')
    <section class="content container-fluid">
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
                                        ID
                                    </th>
                                    <td>
                                        Nom & Prénoms
                                    </td>
                                    <td>
                                        Type demande
                                    </td>
                                    <td>Année Acadé. / d'étu.</td>
                                    <td>Filiere</td>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
