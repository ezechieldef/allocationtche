@extends('layouts.app')
@section('titre')
    Modifier une demande
@endsection

<script>
    function regexcheck(v) {
        var t =
            @php
                echo json_encode(\App\Models\Banque::pluck('regex', 'LibellecourtBanque')->toArray());
            @endphp;
        var debut =
            @php
                echo json_encode(\App\Models\Banque::pluck('format', 'LibellecourtBanque')->toArray());
            @endphp;

        var rib = document.getElementById('RIB');
        if (t[v] != undefined) {
            rib.setAttribute("pattern", t[v]);
            rib.setAttribute("title", 'les RIB commence par ' + debut[v] + ' à ' + v);
        } else {
            rib.removeAttribute("pattern");
            rib.removeAttribute("title");
        }

    }
</script>

@section('content')
    <div class="card">
        <div class="card-header text-bold d-flex justify-content-between">Informations Actuelles

            <a href="/mes-demandes" class="btn btn-primary">Retour</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-12 my-2">
                    <label for="">Matricule</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->Matricule }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Nom</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->NomEtudiant }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">Prénoms</label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->PrenomEtudiant }}">
                </div>
                <div class="col-md-1 col-12 my-2">
                    <label for="">Sexe : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->SexeEtudiant }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Date de Naissance : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->DateNaissanceEtudiant }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Lieu de Naissance : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->LieuNaissanceEtudiant }}">
                </div>

                <div class="col-md-3 col-12 my-2">
                    <label for="">Année Académique : </label>
                    <input type="text" readonly class="form-control" value="{{ \App\Models\AnneeAcademique::find($demLier->CodeAnneeAcademique)->LibelleAnneeAcademique }}">
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">Université : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeUniversite }}">
                </div>
                <div class="col-md-4 col-12 my-2">
                    <label for="">Etablissement : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeEtablissement }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">Filière : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeFiliere }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Année d'Étude : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeAnneeEtude }}">
                </div>
                <div class="col-md-3 col-12 my-2">
                    <label for="">Banque </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->CodeBanque }}">
                </div>
                <div class="col-md-5 col-12 my-2">
                    <label for="">RIB : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->RIB }}">
                    <label class="my-2">
                        @if ($demLier->RIB_valie == 'oui')
                            <i class="fa fa-check text-success mx-2"></i>Ce RIB a déjà été validé par votre Banque en votre
                            nom, vous ne pourrez plus le modifier
                        @else
                            <i class="fa fa-close text-danger mx-2"></i>Ce RIB n'a pas encore été validé par votre Banque en
                            votre nom
                        @endif
                    </label>
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">Téléphone : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->Telephone }}">
                </div>
                <div class="col-md-2 col-12 my-2">
                    <label for="">NPI : </label>
                    <input type="text" readonly class="form-control" value="{{ $demLier->NPI }}">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Formulaire de Modification
        </div>

        <div class="card-body">
            <form action="/modifier-demande/{{ $demandeAllocation->CodeDemandeAllocation }}" method="post">
                <div class="row">
                    @csrf
                    @if ($demLier->RIB_valie != 'oui')
                        <div class="col-md-4 col-12 my-2">
                            {{ Form::label('Banque') }}
                            {{ Form::select('Banque', App\Models\Banque::pluck('LibellecourtBanque', 'CodeBanque'), null, [
                                'id' => 'banque',
                                'onchange' => 'regexcheck(this.value);',
                                'required' => 'required',
                                'class' => 'form-select ' . ($errors->has('Banque') ? ' is-invalid' : ''),
                                'placeholder' => '-- Sélectionner --',
                            ]) }}
                        </div>

                        <div class="col-md-8 col-12 my-2">
                            {{ Form::label('RIB') }}
                            {{ Form::text('RIB', null, ['id' => 'RIB', 'class' => 'form-control' . ($errors->has('RIB') ? ' is-invalid' : ''), 'placeholder' => 'RIB', 'required' => 'required']) }}
                            {!! $errors->first('RIB', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    @endif

                    <div class="col-md-6 col-12 my-2">
                        {{ Form::label('Telephone') }}
                        {{ Form::tel('Telephone', null, ['min' => '8', 'max' => '8', 'required' => 'required', 'class' => 'form-control' . ($errors->has('Telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telephone']) }}
                        {!! $errors->first('Telephone', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-6 col-12 my-2">
                        {{ Form::label('NPI') }}
                        {{ Form::number('NPI', null, ['minlength' => '9', 'maxlength' => '12', 'required' => 'required', 'class' => 'form-control' . ($errors->has('NPI') ? ' is-invalid' : ''), 'placeholder' => 'NPI']) }}
                        {!! $errors->first('NPI', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>

                <div class="text-center">
                    <button class="btn btn-success my-3 px-5 ">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
@endsection
