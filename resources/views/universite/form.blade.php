<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('CodeUniversite') }}
            {{ Form::text('CodeUniversite', $universite->CodeUniversite, ['class' => 'form-control' . ($errors->has('CodeUniversite') ? ' is-invalid' : ''), 'placeholder' => 'Codeuniversite']) }}
            {!! $errors->first('CodeUniversite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LibelleLongUniversite') }}
            {{ Form::text('LibelleLongUniversite', $universite->LibelleLongUniversite, ['class' => 'form-control' . ($errors->has('LibelleLongUniversite') ? ' is-invalid' : ''), 'placeholder' => 'Libellelonguniversite']) }}
            {!! $errors->first('LibelleLongUniversite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UniversiteActif') }}
            {{ Form::text('UniversiteActif', $universite->UniversiteActif, ['class' => 'form-control' . ($errors->has('UniversiteActif') ? ' is-invalid' : ''), 'placeholder' => 'Universiteactif']) }}
            {!! $errors->first('UniversiteActif', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>