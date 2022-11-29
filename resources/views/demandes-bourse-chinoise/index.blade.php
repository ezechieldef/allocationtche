@extends('layouts.app')

@section('titre')
    Mes Demandes de Bourse de coopération Chinoise
@endsection

@section('content')
    <div class="alert alert-info">
        Télécharger le communiqué de la bourse de coopération chinoise en <a href="{{ asset('communique/chine.pdf') }}"
            class="mx-1"> <strong> cliquant ici </strong></a>

    </div>

    @if (count($demandesBourseChinoises) == 0)
        <a href="{{ route('demandes-bourse-chinoise.create') }}" class="btn btn-warning text-dark w-100 my-3 fw-bold">Faire
            une demande de bourse de coopération chinoise</a>
        <div class="">
            <img src="{{ asset('communique/cm1.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/cm2.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/cm3.jpg') }}" class="w-100 shadow my-2" alt="">
            <img src="{{ asset('communique/cm4.jpg') }}" class="w-100 shadow my-2" alt="">
        </div>
    @else
        <div class=" my-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Demandes Bourse Chinoise') }}
                                </span>

                                {{-- <div class="float-right">
                                <a href="" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Nouveau
                                </a>
                              </div> --}}
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable">
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
                                        @foreach (Auth::user()->demandesBourseChinoise() as $demandesBourseChinoise)
                                            <tr>



                                                <td>{{ $demandesBourseChinoise->nom . ' ' . $demandesBourseChinoise->prenoms }}
                                                </td>
                                                <td>{{ $demandesBourseChinoise->date_naissance }}</td>
                                                <td>{{ $demandesBourseChinoise->diplome_de_base . ' | ' . $demandesBourseChinoise->serie_ou_filiere }}
                                                </td>

                                                <td>{{ $demandesBourseChinoise->contact_whatsapp }}</td>
                                                <td>{{ $demandesBourseChinoise->niveau_sollicite . ' | ' . $demandesBourseChinoise->filiere_choisi }}
                                                </td>

                                                <td>
                                                    <form
                                                        action="{{ route('demandes-bourse-chinoise.destroy', $demandesBourseChinoise->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-info text-white "
                                                            href="{{ route('demandes-bourse-chinoise.show', $demandesBourseChinoise->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Imprimer</a>
                                                        @if (!$demandesBourseChinoise->imprime)
                                                            <a class="btn btn-sm btn-success text-white"
                                                                href="{{ route('demandes-bourse-chinoise.edit', $demandesBourseChinoise->id) }}"><i
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
