@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Statistique Simplifié
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100">
                    <thead>
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
@endsection
