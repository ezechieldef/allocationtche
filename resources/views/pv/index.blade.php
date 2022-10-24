@extends('layouts.app')

@section('titre')
    Liste des PV
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Liste des PV
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pv.create') }}"
                                    class="btn btn-warning text-dark text-bold btn-sm float-right" data-placement="left">
                                    Nouveau
                                </a>
                            </div>
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


                                        <th>Code PV</th>
                                        <th>Reference PV</th>
                                        <th>Période</th>
                                        <th>Session</th>
                                        <th>Anneecivile</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pvs as $pv)
                                        <tr>


                                            <td>{{ $pv->CodePV }}</td>
                                            <td>{{ $pv->Reference_PV }}</td>
                                            <td>{{ $pv->DateDebutSession }} à {{ $pv->DateFinSession }}</td>
                                            <td>{{ $pv->Session }}</td>

                                            <td>{{ $pv->AnneeCivile }}</td>


                                            <td class="d-flex">
                                                <form action="{{ route('pv.destroy', $pv->CodePV) }}" method="POST">
                                                    <a class="btn btn-sm btn-secondary text-white "
                                                        href="{{ route('pv.show', $pv->CodePV) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white"
                                                        href="{{ route('pv.edit', $pv->CodePV) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger text-white btn-sm show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Supprimer</button>


                                                </form>
                                                @if ($pv->statut != 'cloturé')
                                                        <a class="btn btn-sm btn-info text-white text-bold mx-3 "
                                                            href="/cloturer-pv/{{ $pv->CodePV }}" onclick="(){return confirm('Voulez-vous vraiment confirmer cette cloture ?')}">Cloturer</a>
                                                    @endif
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
