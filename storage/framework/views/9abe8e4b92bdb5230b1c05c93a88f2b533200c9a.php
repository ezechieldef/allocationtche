<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group my-2">
            <?php echo e(Form::label('libele')); ?>

            <?php echo e(Form::text('libele', $motifsRejet->libele, ['class' => 'form-control' . ($errors->has('libele') ? ' is-invalid' : ''), 'placeholder' => 'Libele'])); ?>

            <?php echo $errors->first('libele', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/motifs-rejet/form.blade.php ENDPATH**/ ?>