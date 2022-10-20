<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Matricule') }}
            {{ Form::text('Matricule', $inscriptionuniversite2021->Matricule, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule']) }}
            {!! $errors->first('Matricule', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NomEtudiant') }}
            {{ Form::text('NomEtudiant', $inscriptionuniversite2021->NomEtudiant, ['class' => 'form-control' . ($errors->has('NomEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Nometudiant']) }}
            {!! $errors->first('NomEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PrenomEtudiant') }}
            {{ Form::text('PrenomEtudiant', $inscriptionuniversite2021->PrenomEtudiant, ['class' => 'form-control' . ($errors->has('PrenomEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Prenometudiant']) }}
            {!! $errors->first('PrenomEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DateNaissanceEtudiant') }}
            {{ Form::text('DateNaissanceEtudiant', $inscriptionuniversite2021->DateNaissanceEtudiant, ['class' => 'form-control' . ($errors->has('DateNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Datenaissanceetudiant']) }}
            {!! $errors->first('DateNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LieuNaissanceEtudiant') }}
            {{ Form::text('LieuNaissanceEtudiant', $inscriptionuniversite2021->LieuNaissanceEtudiant, ['class' => 'form-control' . ($errors->has('LieuNaissanceEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Lieunaissanceetudiant']) }}
            {!! $errors->first('LieuNaissanceEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('SexeEtudiant') }}
            {{ Form::text('SexeEtudiant', $inscriptionuniversite2021->SexeEtudiant, ['class' => 'form-control' . ($errors->has('SexeEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Sexeetudiant']) }}
            {!! $errors->first('SexeEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nationalite') }}
            {{ Form::text('Nationalite', $inscriptionuniversite2021->Nationalite, ['class' => 'form-control' . ($errors->has('Nationalite') ? ' is-invalid' : ''), 'placeholder' => 'Nationalite']) }}
            {!! $errors->first('Nationalite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('AdresseEtudiant') }}
            {{ Form::text('AdresseEtudiant', $inscriptionuniversite2021->AdresseEtudiant, ['class' => 'form-control' . ($errors->has('AdresseEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Adresseetudiant']) }}
            {!! $errors->first('AdresseEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::text('Email', $inscriptionuniversite2021->Email, ['class' => 'form-control' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telephone1') }}
            {{ Form::text('Telephone1', $inscriptionuniversite2021->Telephone1, ['class' => 'form-control' . ($errors->has('Telephone1') ? ' is-invalid' : ''), 'placeholder' => 'Telephone1']) }}
            {!! $errors->first('Telephone1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LibelleCourtUniversite') }}
            {{ Form::text('LibelleCourtUniversite', $inscriptionuniversite2021->LibelleCourtUniversite, ['class' => 'form-control' . ($errors->has('LibelleCourtUniversite') ? ' is-invalid' : ''), 'placeholder' => 'Libellecourtuniversite']) }}
            {!! $errors->first('LibelleCourtUniversite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CodeEtablissement') }}
            {{ Form::text('CodeEtablissement', $inscriptionuniversite2021->CodeEtablissement, ['class' => 'form-control' . ($errors->has('CodeEtablissement') ? ' is-invalid' : ''), 'placeholder' => 'Codeetablissement']) }}
            {!! $errors->first('CodeEtablissement', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CodeFiliere') }}
            {{ Form::text('CodeFiliere', $inscriptionuniversite2021->CodeFiliere, ['class' => 'form-control' . ($errors->has('CodeFiliere') ? ' is-invalid' : ''), 'placeholder' => 'Codefiliere']) }}
            {!! $errors->first('CodeFiliere', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CodeAnneeEtude') }}
            {{ Form::text('CodeAnneeEtude', $inscriptionuniversite2021->CodeAnneeEtude, ['class' => 'form-control' . ($errors->has('CodeAnneeEtude') ? ' is-invalid' : ''), 'placeholder' => 'Codeanneeetude']) }}
            {!! $errors->first('CodeAnneeEtude', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Inscription') }}
            {{ Form::text('Inscription', $inscriptionuniversite2021->Inscription, ['class' => 'form-control' . ($errors->has('Inscription') ? ' is-invalid' : ''), 'placeholder' => 'Inscription']) }}
            {!! $errors->first('Inscription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('StatutAllocataire') }}
            {{ Form::text('StatutAllocataire', $inscriptionuniversite2021->StatutAllocataire, ['class' => 'form-control' . ($errors->has('StatutAllocataire') ? ' is-invalid' : ''), 'placeholder' => 'Statutallocataire']) }}
            {!! $errors->first('StatutAllocataire', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codeEtudiant') }}
            {{ Form::text('codeEtudiant', $inscriptionuniversite2021->codeEtudiant, ['class' => 'form-control' . ($errors->has('codeEtudiant') ? ' is-invalid' : ''), 'placeholder' => 'Codeetudiant']) }}
            {!! $errors->first('codeEtudiant', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>