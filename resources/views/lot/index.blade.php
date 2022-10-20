@extends('layouts.app')

@section('titre')
    Lots
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lot') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lots.create') }}" class="btn btn-warning text-dark text-bold btn-sm float-right"  data-placement="left">
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
                                        <th>ID</th>
										<th>Libele</th>
										<th>Nbre de demandes</th>
										<th>Utilisateur</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lots as $lot)
                                        <tr>
                                            <td>{{ $lot->id }}</td>

											<td>{{ $lot->libele }}</td>
											<td></td>
											<td>{{  \App\Models\User::find($lot->user_id)->email }}</td>
											<td>{{ $lot->status }}</td>

                                            <td>
                                                <form action="{{ route('lots.destroy',$lot->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white" href="{{ route('lots.show',$lot->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="{{ route('lots.edit',$lot->id) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2 "><i class="fa fa-fw fa-trash"></i> Supprimer</button>
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
