<div class="box box-info padding-1">
    <div class="box-body">

         <div class="form-group">
            <?php echo e(Form::label('name')); ?>

            <?php echo e(Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name'])); ?>

            <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <?php echo e(Form::label('banque_assigner')); ?>

                    <?php echo e(Form::select('banque_assigner', \App\Models\Banque::pluck('LibellelongBanque', 'CodeBanque'), $user->banque_assigner, ['class' => 'form-select' . ($errors->has('banque_assigner') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                    <?php echo $errors->first('banque_assigner', '<div class="invalid-feedback">:message</div>'); ?>

                    <?php echo $errors->first('banque_assigner', '<div class="alert alert-danger">:message</div>'); ?>

                </div>
            </div>
        </div>




    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-white text-bold">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/user/form.blade.php ENDPATH**/ ?>