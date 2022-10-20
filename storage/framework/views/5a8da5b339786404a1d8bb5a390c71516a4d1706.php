<script>
    function univchange(v) {
        document.getElementById('champ2').value='';
        document.querySelectorAll("#champ2 option").forEach(opt => {
            if (opt.value == v.value) {
                opt.disabled = true;
            }else{
                opt.disabled = false;
            }
        });
    }
</script>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <?php echo e(Form::label('Université')); ?>

            <?php echo e(Form::select('champ1', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'),
             $correspondanceUniversite->champ1, ['onchange'=>'univchange(this);', 'class' => 'form-select' . ($errors->has('champ1') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

            <?php echo $errors->first('champ1', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('Correspond à (synonyme)')); ?>

            <?php echo e(Form::select('champ2', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), $correspondanceUniversite->champ2, [ 'id'=>'champ2','class' => 'form-select' . ($errors->has('champ2') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

            <?php echo $errors->first('champ2', '<div class="invalid-feedback">:message</div>'); ?>

        </div>


    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-info px-4 text-bold text-white">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/correspondance-universite/form.blade.php ENDPATH**/ ?>