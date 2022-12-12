@extends('layouts.app')

@section('titre')
    Ma Demande de Bourse de Copération Russe
@endsection

@section('content')
    <div class="alert alert-info">
        Télécharger le communiqué de la bourse de coopération chinoise en <a href="{{ asset('communique/russie.pdf') }}"
            class="mx-1"> <strong> cliquant ici </strong></a>

    </div>

    @if (count($demandesBourseRussies) == 0)
        <a href="{{ route('demandes-bourse-russie.create') }}" class="btn btn-warning text-dark w-100 my-3 fw-bold">Faire
            une demande de bourse de coopération russe</a>
        <div class="">
            <img src="{{ asset('communique/r1.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r2.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r3.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r4.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r5.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r6.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/r7.jpg') }}" class="w-100 shadow my-2" alt="">
        </div>
    @else
        <div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Demandes Bourse Russie') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('demandes-bourse-russie.create') }}"
                                        class="btn btn-warning text-dark btn-sm float-right" data-placement="left">
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



                                            <th>Nom & Prénoms</th>
                                            <th>Date Naissance</th>
                                            <th>Diplome de base </th>

                                            <th>Whatsapp</th>
                                            <th>Niveau & Filière sollicité</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($demandesBourseRussies as $demandesBourseRussie)
                                            <tr>



                                                <td>{{ $demandesBourseRussie->nom . ' ' . $demandesBourseRussie->prenoms }}
                                                </td>
                                                <td>{{ $demandesBourseRussie->date_naissance }}</td>
                                                <td>{{ $demandesBourseRussie->diplome_de_base . ' | ' . $demandesBourseRussie->serie_ou_filiere }}
                                                </td>

                                                <td>{{ $demandesBourseRussie->contact_whatsapp }}</td>
                                                <td>{{ $demandesBourseRussie->niveau_sollicite . ' | ' . $demandesBourseRussie->filiere_choisi }}
                                                </td>

                                                <td>
                                                    <form
                                                        action="{{ route('demandes-bourse-russie.destroy', $demandesBourseRussie->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-info text-white "
                                                            href="{{ route('demandes-bourse-russie.show', $demandesBourseRussie->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Imprimer</a>
                                                        @if (!$demandesBourseRussie->imprime)
                                                            <a class="btn btn-sm btn-success text-white"
                                                                href="{{ route('demandes-bourse-russie.edit', $demandesBourseRussie->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> Modifier</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                                    class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                        @endif

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
    @endif
@endsection
