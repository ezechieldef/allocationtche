<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group my-2">
            {{ Form::label('libele') }}
            {{ Form::text('libele', $motifsRejet->libele, ['class' => 'form-control' . ($errors->has('libele') ? ' is-invalid' : ''), 'placeholder' => 'Libele']) }}
            {!! $errors->first('libele', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
