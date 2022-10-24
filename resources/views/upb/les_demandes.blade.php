@extends('layouts.app')
@section('titre')
    Liste des demandes d'allocation
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Liste </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="mytable">
                    <thead>
                        <th>Code</th>
                        <th>Matricule</th>
                        <th>Nom & Prénoms</th>
                        <th>Filiere</th>
                        <th>Type</th>
                        <th>Nature</th>
                        <th>Année Aca. / Niveau</th>
                        <th>Id Transaction</th>
                    </thead>
                    <tbody>
                        @foreach ($dem as $demande)
                            <tr>
                                <td>
                                    {{ $demande->CodeDemandeAllocation }}
                                </td>
                                <td class="text-dark">{{ $demande->Matricule }}</td>
                                <td>{{ $demande->NomEtudiant . ' ' . $demande->PrenomEtudiant }}</td>
                                <td><strong class="text-dark"> {{ $demande->CodeFiliere }}</strong></td>
                                <td class="text-info"> {{ $demande->CodeTypeDemande }}</td>
                                <td> {{ $demande->CodeNatureAllocation }}</td>
                                <td> {{ \App\Models\AnneeAcademique::find($demande->CodeAnneeAcademique)->LibelleAnneeAcademique }} / {{ $demande->CodeAnneeEtude }}</td>
                                <td>{{ $demande->idtransaction }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
