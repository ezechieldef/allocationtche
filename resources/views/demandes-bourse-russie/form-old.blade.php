<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group my-2">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $demandesBourseRussie->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('code') }}
            {{ Form::text('code', $demandesBourseRussie->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('NPI') }}
            {{ Form::text('NPI', $demandesBourseRussie->NPI, ['class' => 'form-control' . ($errors->has('NPI') ? ' is-invalid' : ''), 'placeholder' => 'Npi']) }}
            {!! $errors->first('NPI', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('nom') }}
            {{ Form::text('nom', $demandesBourseRussie->nom, ['class' => 'form-control' . ($errors->has('nom') ? ' is-invalid' : ''), 'placeholder' => 'Nom']) }}
            {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('prenoms') }}
            {{ Form::text('prenoms', $demandesBourseRussie->prenoms, ['class' => 'form-control' . ($errors->has('prenoms') ? ' is-invalid' : ''), 'placeholder' => 'Prenoms']) }}
            {!! $errors->first('prenoms', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('date_naissance') }}
            {{ Form::text('date_naissance', $demandesBourseRussie->date_naissance, ['class' => 'form-control' . ($errors->has('date_naissance') ? ' is-invalid' : ''), 'placeholder' => 'Date Naissance']) }}
            {!! $errors->first('date_naissance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('lieu_naissance') }}
            {{ Form::text('lieu_naissance', $demandesBourseRussie->lieu_naissance, ['class' => 'form-control' . ($errors->has('lieu_naissance') ? ' is-invalid' : ''), 'placeholder' => 'Lieu Naissance']) }}
            {!! $errors->first('lieu_naissance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('sexe') }}
            {{ Form::text('sexe', $demandesBourseRussie->sexe, ['class' => 'form-control' . ($errors->has('sexe') ? ' is-invalid' : ''), 'placeholder' => 'Sexe']) }}
            {!! $errors->first('sexe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('diplome_de_base') }}
            {{ Form::text('diplome_de_base', $demandesBourseRussie->diplome_de_base, ['class' => 'form-control' . ($errors->has('diplome_de_base') ? ' is-invalid' : ''), 'placeholder' => 'Diplome De Base']) }}
            {!! $errors->first('diplome_de_base', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('serie_ou_filiere') }}
            {{ Form::text('serie_ou_filiere', $demandesBourseRussie->serie_ou_filiere, ['class' => 'form-control' . ($errors->has('serie_ou_filiere') ? ' is-invalid' : ''), 'placeholder' => 'Serie Ou Filiere']) }}
            {!! $errors->first('serie_ou_filiere', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('annee_obtention_bac') }}
            {{ Form::text('annee_obtention_bac', $demandesBourseRussie->annee_obtention_bac, ['class' => 'form-control' . ($errors->has('annee_obtention_bac') ? ' is-invalid' : ''), 'placeholder' => 'Annee Obtention Bac']) }}
            {!! $errors->first('annee_obtention_bac', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('moyenne_bac') }}
            {{ Form::text('moyenne_bac', $demandesBourseRussie->moyenne_bac, ['class' => 'form-control' . ($errors->has('moyenne_bac') ? ' is-invalid' : ''), 'placeholder' => 'Moyenne Bac']) }}
            {!! $errors->first('moyenne_bac', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('mention') }}
            {{ Form::text('mention', $demandesBourseRussie->mention, ['class' => 'form-control' . ($errors->has('mention') ? ' is-invalid' : ''), 'placeholder' => 'Mention']) }}
            {!! $errors->first('mention', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('niveau_sollicite') }}
            {{ Form::text('niveau_sollicite', $demandesBourseRussie->niveau_sollicite, ['class' => 'form-control' . ($errors->has('niveau_sollicite') ? ' is-invalid' : ''), 'placeholder' => 'Niveau Sollicite']) }}
            {!! $errors->first('niveau_sollicite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('filiere_choisi') }}
            {{ Form::text('filiere_choisi', $demandesBourseRussie->filiere_choisi, ['class' => 'form-control' . ($errors->has('filiere_choisi') ? ' is-invalid' : ''), 'placeholder' => 'Filiere Choisi']) }}
            {!! $errors->first('filiere_choisi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('status_bourse') }}
            {{ Form::text('status_bourse', $demandesBourseRussie->status_bourse, ['class' => 'form-control' . ($errors->has('status_bourse') ? ' is-invalid' : ''), 'placeholder' => 'Status Bourse']) }}
            {!! $errors->first('status_bourse', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('contact_whatsapp') }}
            {{ Form::text('contact_whatsapp', $demandesBourseRussie->contact_whatsapp, ['class' => 'form-control' . ($errors->has('contact_whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'Contact Whatsapp']) }}
            {!! $errors->first('contact_whatsapp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('contact_parent') }}
            {{ Form::text('contact_parent', $demandesBourseRussie->contact_parent, ['class' => 'form-control' . ($errors->has('contact_parent') ? ' is-invalid' : ''), 'placeholder' => 'Contact Parent']) }}
            {!! $errors->first('contact_parent', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('imprime') }}
            {{ Form::text('imprime', $demandesBourseRussie->imprime, ['class' => 'form-control' . ($errors->has('imprime') ? ' is-invalid' : ''), 'placeholder' => 'Imprime']) }}
            {!! $errors->first('imprime', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
