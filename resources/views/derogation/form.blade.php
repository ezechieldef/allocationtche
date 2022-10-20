<script>
    function arrange() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("sel-ets");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;

        var fil_select = document.getElementById("sel-fil");
        var fil_v = fil_select.options[fil_select.selectedIndex].value;

        //console.log(univ_select.options);
        //enfant


        if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select.value = '';
            fil_select.value = '';

            // document.getElementById('filiere_acc_id').value = '';
        }
        for (var i = 0; i < ets_select.options.length; i++) {
            //console.log(ets_select.options[i]);
            if (ets_select.options[i].getAttribute("parent") != univ_v) {
                ets_select.options[i].setAttribute("hidden", '');
            } else {
                ets_select.options[i].removeAttribute("hidden");
            }
        }

        //sous enfant

        if (fil_select.options[fil_select.selectedIndex].getAttribute("parent") != ets_v) {
            fil_select.value = '';
        }

        for (var i = 0; i < fil_select.options.length; i++) {

            if (fil_select.options[i].getAttribute("parent") != ets_v) {
                fil_select.options[i].setAttribute("hidden", '');
            } else {
                fil_select.options[i].removeAttribute("hidden");
            }
        }

    }

    function change(v) {
        // document.getElementById('filiere_acc_id').value = v.value;

    }
</script>


<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Matricule') }}
            {{ Form::text('Matricule', $derogation->Matricule, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('Matricule', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nom Etudiant') }}
            {{ Form::text('NomEtudiant', $derogation->NomEtudiant, ['class' => 'form-control' . ($errors->has('NomEtudiant') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('NomEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Prenom Etudiant') }}
            {{ Form::text('PrenomEtudiant', $derogation->PrenomEtudiant, ['class' => 'form-control' . ($errors->has('PrenomEtudiant') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('PrenomEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Date Naissance Etudiant') }}
            {{ Form::date('DateNaissanceEtudiant', $derogation->DateNaissanceEtudiant, ['class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Lieu Naissance Etudiant') }}
            {{ Form::text('LieuNaissanceEtudiant', $derogation->LieuNaissanceEtudiant, ['class' => 'form-control' . ($errors->has('LieuNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('LieuNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Sexe Etudiant') }}
            {{ Form::select('SexeEtudiant', ['F' => 'Féminin', 'M' => 'Masculin'], $derogation->SexeEtudiant, ['class' => 'form-select' . ($errors->has('SexeEtudiant') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('SexeEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nationalite') }}
            {{ Form::text('Nationalite', $derogation->Nationalite ?? 'Béninoise', ['class' => 'form-control' . ($errors->has('Nationalite') ? ' is-invalid' : ''), 'placeholder' => 'Nationalite']) }}
            {!! $errors->first('Nationalite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Adresse Etudiant') }}
            {{ Form::text('AdresseEtudiant', $derogation->AdresseEtudiant ?? '-', ['class' => 'form-control' . ($errors->has('AdresseEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Adresseetudiant']) }}
            {!! $errors->first('AdresseEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::email('Email', $derogation->Email, ['pattern'=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$", 'class' => 'form-control' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('Telephone1') }}
            {{ Form::tel('Telephone1', $derogation->Telephone1 , [ 'minlength'=>'8', 'class' => 'form-control' . ($errors->has('Telephone1') ? ' is-invalid' : ''), 'placeholder' => 'Telephone1']) }}
            {!! $errors->first('Telephone1', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('Universite') }}
            {{ Form::select('LibelleCourtUniversite', App\Models\Universite::pluck('LibelleLongUniversite','CodeUniversite'), $derogation->LibelleCourtUniversite, ['class' => 'form-control' . ($errors->has('LibelleCourtUniversite') ? ' is-invalid' : ''), 'placeholder' => 'Libellecourtuniversite']) }}
            {!! $errors->first('LibelleCourtUniversite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Etablissement') }}
            {{ Form::select('CodeEtablissement',App\Models\Etablissement::pluck('LibelleEtablissement','CodeEtablissement'), $derogation->CodeEtablissement, ['class' => 'form-control' . ($errors->has('CodeEtablissement') ? ' is-invalid' : ''), 'placeholder' => 'Codeetablissement']) }}
            {!! $errors->first('CodeEtablissement', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CodeFiliere') }}
            {{ Form::text('CodeFiliere', $derogation->CodeFiliere, ['class' => 'form-control' . ($errors->has('CodeFiliere') ? ' is-invalid' : ''), 'placeholder' => 'Codefiliere']) }}
            {!! $errors->first('CodeFiliere', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

        <div class="form-group">
            {{ Form::label('Universités') }}
            {{ Form::select(
                'CodeUniversite',
                \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'),
                null,
                [
                    'id' => 'sel-univ',
                    'class' => 'form-select  ' . ($errors->has('CodeUniversite') ? ' is-invalid' : ''),
                    'placeholder' => '-- Séletionner --',
                    'onchange' => 'arrange();',
                ],
            ) }}
            {!! $errors->first('CodeUniversite', '<div class="invalid-feedback">:message</div>') !!}


        </div>



        <div class="form-group">
            {{ Form::label('Etablissement ') }}
            <select id="sel-ets" class="form-select" onchange="arrange()" name="CodeEtablissement">
                <option value=""> -- Sélectionner -- </option>
                @foreach (\App\Models\Etablissement::all() as $an)
                    <option value="{{ $an->CodeEtablissement }}" parent='{{ $an->CodeUniversite }}' hidden>
                        {{ $an->LibelleEtablissement }} </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            {{ Form::label('Filière ') }}
            <select id="sel-fil" class="form-select " onchange="change(this)" name="CodeFiliere">
                <option value=""> --Sélectionner -- </option>
                @foreach (\App\Models\Filiere::all() as $an)
                    <option value="{{ $an->CodeFiliere }}" parent='{{ $an->CodeEtablissement }}' hidden>
                        {{ $an->LibelleFiliere }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('Annee Etude') }}
            {{ Form::select('CodeAnneeEtude', App\Models\AnneeEtude::pluck('CodeAnneeEtude', 'CodeAnneeEtude'), $derogation->CodeAnneeEtude, ['class' => 'form-select' . ($errors->has('CodeAnneeEtude') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('CodeAnneeEtude', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('Inscription') }}
            {{ Form::text('Inscription', $derogation->Inscription, ['class' => 'form-control' . ($errors->has('Inscription') ? ' is-invalid' : ''), 'placeholder' => 'Inscription']) }}
            {!! $errors->first('Inscription', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('Statut Allocataire') }}
            {{ Form::select('StatutAllocataire', ['BOURSE' => 'BOURSE', 'AIDES' => 'Aides Universitaire'], $derogation->StatutAllocataire, ['class' => 'form-select' . ($errors->has('StatutAllocataire') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('StatutAllocataire', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Motif') }}
            {{ Form::textArea('motif', $derogation->motif, ['class' => 'form-control' . ($errors->has('motif') ? ' is-invalid' : ''), 'placeholder' => 'Motif de la dérogation']) }}
            {!! $errors->first('motif', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-white">Soumettre</button>
    </div>
</div>
