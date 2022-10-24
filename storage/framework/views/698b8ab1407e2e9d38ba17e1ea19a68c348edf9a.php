<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Numero')); ?>

                <?php echo e(Form::number('Numero', $lot->Numero, ['class' => 'form-control' . ($errors->has('Numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero'])); ?>

                <?php echo $errors->first('Numero', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('PV')); ?>

                <?php echo e(Form::select('CodePV',\App\Models\Pv::pluck('Reference_PV','CodePV'), $lot->CodePV, ['class' => 'form-select' . ($errors->has('CodePV') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                <?php echo $errors->first('CodePV', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Commissaire')); ?>

                <?php echo e(Form::select('Commissaire', \App\Models\User::pluck('email','id'), $lot->Commissaire, ['class' => 'form-select' . ($errors->has('Commissaire') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                <?php echo $errors->first('Commissaire', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-12 col-12 my-2">
                <?php echo e(Form::label('status')); ?>

                <?php echo e(Form::text('status', $lot->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status'])); ?>

                <?php echo $errors->first('status', '<div class="invalid-feedback">:message</div>'); ?>

            </div>

        </div>

    </div>
    <div class="box-footer mt20 my-2">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/lot/form.blade.php ENDPATH**/ ?>