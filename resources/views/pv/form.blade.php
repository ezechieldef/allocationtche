<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-8 col-12 my-2">
                {{ Form::label('Reference_PV') }}
                {{ Form::text('Reference_PV', $pv->Reference_PV, ['class' => 'form-control' . ($errors->has('Reference_PV') ? ' is-invalid' : ''), 'placeholder' => 'Reference ']) }}
                {!! $errors->first('Reference_PV', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Année Civile') }}
                {{ Form::select('AnneeCivile',['2024'=>'2024', '2023'=>'2023', '2022'=>'2022','2021'=>'2021'], $pv->AnneeCivile, ['class' => 'form-select' . ($errors->has('AnneeCivile') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
                {!! $errors->first('AnneeCivile', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 col-12 my-2">
                {{ Form::label('Date Debut Session') }}
                {{ Form::date('DateDebutSession', $pv->DateDebutSession, ['class' => 'form-control' . ($errors->has('DateDebutSession') ? ' is-invalid' : ''), 'placeholder' => 'Datedebutsession']) }}
                {!! $errors->first('DateDebutSession', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 col-12 my-2">
                {{ Form::label('Date Fin Session') }}
                {{ Form::date('DateFinSession', $pv->DateFinSession, ['class' => 'form-control' . ($errors->has('DateFinSession') ? ' is-invalid' : ''), 'placeholder' => 'Date fin session']) }}
                {!! $errors->first('DateFinSession', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Note Bas Page') }}
                {{ Form::text('NoteBasPage', $pv->NoteBasPage, ['class' => 'form-control' . ($errors->has('NoteBasPage') ? ' is-invalid' : ''), 'placeholder' => 'Notebaspage']) }}
                {!! $errors->first('NoteBasPage', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Date Transmission Liste') }}
                {{ Form::date('DateTransmissionListe', $pv->DateTransmissionListe, ['class' => 'form-control' . ($errors->has('DateTransmissionListe') ? ' is-invalid' : ''), 'placeholder' => 'Datetransmissionliste']) }}
                {!! $errors->first('DateTransmissionListe', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Ref Lettre Transmision Liste') }}
                {{ Form::text('RefLettreTransmisionListe', $pv->RefLettreTransmisionListe, ['class' => 'form-control' . ($errors->has('RefLettreTransmisionListe') ? ' is-invalid' : ''), 'placeholder' => 'Reflettretransmisionliste']) }}
                {!! $errors->first('RefLettreTransmisionListe', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20 py-3">
        <button type="submit" class="btn btn-success w-100 text-bold text-white">Soumettre</button>
    </div>
</div>
