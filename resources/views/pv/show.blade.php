@extends('layouts.app')

@section('template_title')
    Détail PV
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail PV</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark" href="{{ route('pv.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-2 col-12 my-2">
                                <strong>Code PV:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->CodePV }}">
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Reference PV:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->Reference_PV }}">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Datedebutsession:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->DateDebutSession }}">
                            </div>

                            <div class="col-md-3 col-12 my-2">
                                <strong>Datefinsession:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->DateFinSession }}">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Anneecivile:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->AnneeCivile }}">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Notebaspage:</strong>
                                <input type="text" readonly class="form-control" value="{{ $pv->NoteBasPage }}">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Date Transmission Liste:</strong>
                                <input type="text" readonly class="form-control"
                                    value="{{ $pv->DateTransmissionListe }}">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Ref lettre Transmisionliste:</strong>
                                <input type="text" readonly class="form-control"
                                    value="{{ $pv->RefLettreTransmisionListe }}">
                            </div>
                        </div>

                        <div class="bg-gray-200 text-dark text-bold text-center py-2 my-3">
                            Statistique
                        </div>
                        @php
                            $i = 0;
                        @endphp
                        <ul>

                            @foreach ($groups as $an => $data1)
                                <li>
                                    <div class="h5">Année Académique : <strong>{{ $an }}</strong></div>
<ul>
                                    @foreach ($data1 as $univ=>$data2)
                                        <li><div class="h6 text-center ">Université : <strong>{{ $univ }}</strong></div></li>

                                        @foreach ($data2 as $nature=>$data3 )
                                        <table class="table">
                                            <tr class="bg-gray-200">
                                                <td colspan="5" class="text-center bg-gray-200" >{{ $nature }}</td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td>Etablissements</td>
                                                <td>Nombre de Demandes</td>
                                                <td>Favorable</td>
                                                <td>Défavorable</td>
                                                <td>Réservé</td>
                                            </tr>
                                            <tbody>
                                                @foreach ($data3 as $ets )
                                                    <tr>
                                                        <td>{{ $ets->LibelleEtablissement }}</td>
                                                        <td>{{ $ets->nbr }}</td>
                                                        <td>{{ $ets->nbr_fav }}</td>
                                                        <td>{{ $ets->nbr_def }}</td>
                                                        <td>{{ $ets->nbr_res }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                        @endforeach

                                    @endforeach
                                </ul>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
