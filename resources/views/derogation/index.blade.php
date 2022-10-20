@extends('layouts.app')

@section('titre')
    Derogation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Derogation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('derogations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>

										<th>Matricule</th>
										<th>Nometudiant</th>
										<th>Prenometudiant</th>
										<th>Datenaissanceetudiant</th>
										<th>Universite</th>
										<th>Etablissement</th>
										<th>Filiere</th>
										<th>Annee Etude</th>

										<th>Statut allocataire</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($derogations as $derogation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $derogation->Matricule }}</td>
											<td>{{ $derogation->NomEtudiant }}</td>
											<td>{{ $derogation->PrenomEtudiant }}</td>
											<td>{{ $derogation->DateNaissanceEtudiant }}</td>

											<td>{{ $derogation->CodeUniversite }}</td>
											<td>{{ $derogation->CodeEtablissement }}</td>
											<td>{{ $derogation->CodeFiliere }}</td>
											<td>{{ $derogation->CodeAnneeEtude }}</td>

											<td>{{ $derogation->StatutAllocataire }}</td>


                                            <td>
                                                <form action="{{ route('derogations.destroy',$derogation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="{{ route('derogations.show',$derogation->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="{{ route('derogations.edit',$derogation->id) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $derogations->links() !!}
            </div>
        </div>
    </div>
@endsection
