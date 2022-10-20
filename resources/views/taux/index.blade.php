@extends('layouts.app')

@section('titre')
    Taux
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Taux') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('taux.create') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
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
										<th>Code Filiere</th>
										<th>Année d'étude</th>
										<th>Nature Allocation</th>
										<th>Code Année Academique</th>
										<th>Taux Allocation</th>
										<th>Accessoire Allocation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tauxes as $taux)
                                        <tr>


											<td>{{ $taux->CodeTaux }}</td>
											<td>{{ $taux->CodeFiliere }}</td>
											<td>{{ $taux->CodeAnneeEtude }}</td>
											<td>{{ $taux->CodeNatureAllocation }}</td>
											<td>{{ \App\Models\AnneeAcademique::find($taux->CodeAnneeAcademique)->LibelleAnneeAcademique }}</td>
											<td>{{ $taux->TauxAllocation }}</td>
											<td>{{ $taux->AccessoireAllocation }}</td>

                                            <td>
                                                <form action="{{ route('taux.destroy',$taux->CodeTaux) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="{{ route('taux.show',$taux->CodeTaux) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="{{ route('taux.edit',$taux->CodeTaux) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
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

            </div>
        </div>
    </div>
@endsection
