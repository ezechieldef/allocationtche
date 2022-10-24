<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('libele') }}
            {{ Form::text('libele', $lot->libele, ['class' => 'form-control' . ($errors->has('libele') ? ' is-invalid' : ''), 'placeholder' => 'Libele']) }}
            {!! $errors->first('libele', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group ">
            {{ Form::label('Utilisateur') }}
            {{ Form::select('user_id', \App\Models\User::pluck('email','id'), $lot->user_id, ['class' => 'form-select' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::select('status',['OUVERT'=>'OUVERT','FERMÉ'=>'FERMÉ'], $lot->status, ['class' => 'form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-white w-100">Soumettre</button>
    </div>
</div>
