<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Numero') }}
                {{ Form::number('Numero', $lot->Numero, ['class' => 'form-control' . ($errors->has('Numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
                {!! $errors->first('Numero', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('PV') }}
                {{ Form::select('CodePV',\App\Models\Pv::where('statut','!=','cloturé')->pluck('Reference_PV','CodePV'), $lot->CodePV, ['class' => 'form-select' . ($errors->has('CodePV') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
                {!! $errors->first('CodePV', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 col-12 my-2">
                {{ Form::label('Commissaire') }}
                {{ Form::select('Commissaire', \App\Models\User::role('commissaire-CNABAU')->pluck('name','id'), $lot->Commissaire, ['class' => 'form-select' . ($errors->has('Commissaire') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
                {!! $errors->first('Commissaire', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-12 col-12 my-2">
                {{ Form::label('status') }}
                {{ Form::select('status', ['OUVERT'=>'OUVERT','FERMÉ'=>'FERMÉ'], $lot->status, ['class' => 'form-select' . ($errors->has('status') ? ' is-invalid' : ''),]) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>

    </div>
    <div class="box-footer mt20 my-2">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
