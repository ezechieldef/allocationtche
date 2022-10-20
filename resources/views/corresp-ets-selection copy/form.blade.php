<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('CodeEtablissement1') }}
            {{ Form::text('CodeEtablissement1', $correspEtsSelection->CodeEtablissement1, ['class' => 'form-control' . ($errors->has('CodeEtablissement1') ? ' is-invalid' : ''), 'placeholder' => 'Codeetablissement1']) }}
            {!! $errors->first('CodeEtablissement1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('etablissementSelection') }}
            {{ Form::text('etablissementSelection', $correspEtsSelection->etablissementSelection, ['class' => 'form-control' . ($errors->has('etablissementSelection') ? ' is-invalid' : ''), 'placeholder' => 'Etablissementselection']) }}
            {!! $errors->first('etablissementSelection', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>