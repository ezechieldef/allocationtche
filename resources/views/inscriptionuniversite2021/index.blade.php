@extends('layouts.app')

@section('template_title')
    Inscriptionuniversite2021
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscriptionuniversite2021') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inscriptionuniversite2021s.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Matricule</th>
										<th>Nometudiant</th>
										<th>Prenometudiant</th>
										<th>Datenaissanceetudiant</th>
										<th>Lieunaissanceetudiant</th>
										<th>Sexeetudiant</th>
										<th>Nationalite</th>
										<th>Adresseetudiant</th>
										<th>Email</th>
										<th>Telephone1</th>
										<th>Libellecourtuniversite</th>
										<th>Codeetablissement</th>
										<th>Codefiliere</th>
										<th>Codeanneeetude</th>
										<th>Inscription</th>
										<th>Statutallocataire</th>
										<th>Codeetudiant</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscriptionuniversite2021s as $inscriptionuniversite2021)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $inscriptionuniversite2021->Matricule }}</td>
											<td>{{ $inscriptionuniversite2021->NomEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->PrenomEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->DateNaissanceEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->LieuNaissanceEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->SexeEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->Nationalite }}</td>
											<td>{{ $inscriptionuniversite2021->AdresseEtudiant }}</td>
											<td>{{ $inscriptionuniversite2021->Email }}</td>
											<td>{{ $inscriptionuniversite2021->Telephone1 }}</td>
											<td>{{ $inscriptionuniversite2021->LibelleCourtUniversite }}</td>
											<td>{{ $inscriptionuniversite2021->CodeEtablissement }}</td>
											<td>{{ $inscriptionuniversite2021->CodeFiliere }}</td>
											<td>{{ $inscriptionuniversite2021->CodeAnneeEtude }}</td>
											<td>{{ $inscriptionuniversite2021->Inscription }}</td>
											<td>{{ $inscriptionuniversite2021->StatutAllocataire }}</td>
											<td>{{ $inscriptionuniversite2021->codeEtudiant }}</td>

                                            <td>
                                                <form action="{{ route('inscriptionuniversite2021s.destroy',$inscriptionuniversite2021->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inscriptionuniversite2021s.show',$inscriptionuniversite2021->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inscriptionuniversite2021s.edit',$inscriptionuniversite2021->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $inscriptionuniversite2021s->links() !!}
            </div>
        </div>
    </div>
@endsection
