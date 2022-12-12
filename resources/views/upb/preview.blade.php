@extends('layouts.app')
@section('titre')
    Statistique Simplifiée
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-md-6 col-12 my-2">
            <strong>Nombre total d'utilisateur</strong>
            <input type="text" readonly class="form-control" value="{{ \App\Models\User::all()->count() }}">
        </div>
        <div class="col-md-6 col-12 my-2">
            <strong>Nombre Total de demande </strong>
            <input type="text" readonly class="form-control" value="{{ \App\Models\DemandeAllocationUPB::all()->count() }}">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Statistique Simplifiée
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100 datatable">
                    <thead class="text-dark">
                        <th>Université</th>
                        <th>Bourses</th>
                        <th>Aides</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\Universite::all() as $univ)
                            <tr>
                                <td>
                                    {{ $univ->CodeUniversite }}
                                </td>
                                <td>{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                                                            AND D.CodeNatureAllocation LIKE "B%" ',
                                    [$univ->CodeUniversite],
                                )[0]->nb }}
                                </td>
                                <td>{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                                                            AND D.CodeNatureAllocation LIKE "A%" ',
                                    [$univ->CodeUniversite],
                                )[0]->nb }}
                                </td>
                                <td>{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                                                            ',
                                    [$univ->CodeUniversite],
                                )[0]->nb }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Banques
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100 datatable">
                    <thead class="text-dark">
                        <th>Banque</th>
                        <!-- <th>Libellé</th> -->
                        <th class="text-center">Nombre</th>
                        <th>Aides</th>
                        <th>Bourse</th>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\Banque::all() as $univ)
                            <tr>
                                <td class="">
                                    {{ $univ->LibellecourtBanque }}
                                </td>
                               <!--  <td>
                                    {{ $univ->LibellelongBanque }}
                                </td> -->
                                
                                <td class="text-dark fw-bold text-center">{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D WHERE D.CodeBanque=?',
                                    [$univ->CodeBanque],
                                )[0]->nb }}
                                </td>

                                <td class=" text-center">{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D WHERE D.CodeBanque=? AND D.CodeNatureAllocation="AIDES" ',
                                    [$univ->CodeBanque],
                                )[0]->nb }}
                                </td>
                                <td class=" text-center">{{ DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D WHERE D.CodeBanque=? AND D.CodeNatureAllocation="BOURSE" ',
                                    [$univ->CodeBanque],
                                )[0]->nb }}
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
