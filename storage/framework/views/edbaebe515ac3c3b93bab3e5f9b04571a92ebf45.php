<script>
    function arrange() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("champ1");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;
        var ets_select2 = document.getElementById("champ2");
        var ets_v2 = ets_select2.options[ets_select.selectedIndex].value;



        //console.log(univ_select.options);
        //enfant


        if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select.value = '';

            // document.getElementById('filiere_acc_id').value = '';
        }
        if (ets_select2.options[ets_select2.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select2.value = '';

            // document.getElementById('filiere_acc_id').value = '';
        }
        for (var i = 0; i < ets_select.options.length; i++) {
            //console.log(ets_select.options[i]);
            if (ets_select.options[i].getAttribute("parent") != univ_v) {
                ets_select.options[i].setAttribute("hidden", '');
            } else {
                ets_select.options[i].removeAttribute("hidden");
            }
        }
        for (var i = 0; i < ets_select2.options.length; i++) {
            //console.log(ets_select.options[i]);
            if (ets_select2.options[i].getAttribute("parent") != univ_v) {
                ets_select2.options[i].setAttribute("hidden", '');
            } else {
                ets_select2.options[i].removeAttribute("hidden");
            }
        }


    }

    function change(v) {
        document.getElementById('filiere_acc_id').value = v.value;

    }
    function filsel(v) {
        document.getElementById('champ2').value='';
        document.querySelectorAll("#champ2 option").forEach(opt => {
            if (opt.value == v) {
                opt.disabled = true;
            }else{
                opt.disabled = false;
            }
        });
    }
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
<div class="col-12">
    <?php echo $errors->first('champ1', '<div class="alert alert-danger">:message</div>'); ?>

    <?php echo $errors->first('champ2', '<div class="alert alert-danger">:message</div>'); ?>


</div>
        <div class="col-12 form-group mb-3">
            <?php echo e(Form::label('Universités')); ?>

            <?php echo e(Form::select('universite', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, [
                'id' => 'sel-univ',
                'class' => 'form-select ' . ($errors->has('universite') ? ' is-invalid' : ''),
                'placeholder' => '-- Séletionner --',
                'onchange' => 'arrange();',
            ])); ?>

        </div>

        <div class="col-md-6 col-12">

                <?php echo e(Form::label('Etablissement ')); ?>

                <select id="champ1" name="champ1" class="form-select" onchange="filsel(this.value);" value="<?php echo e($correspondanceEtablissement->champ1); ?>">
                    <option value=""> -- Sélectionner -- </option>
                    <?php $__currentLoopData = \App\Models\Etablissement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->CodeEtablissement); ?>" parent='<?php echo e($an->CodeUniversite); ?>' hidden>
                            <?php echo e($an->LibelleEtablissement); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

        </div>

        <div class="col-md-6 col-12">

                <?php echo e(Form::label('Correspond à')); ?>

                <select id="champ2" name="champ2" class="form-select" value="<?php echo e($correspondanceEtablissement->champ2); ?>">
                    <option value=""> -- Sélectionner -- </option>
                    <?php $__currentLoopData = \App\Models\Etablissement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->CodeEtablissement); ?>" parent='<?php echo e($an->CodeUniversite); ?>' hidden>
                            <?php echo e($an->LibelleEtablissement); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>




        </div>
    </div>



    </div>
    <div class="box-footer mt20 mt-3 text-center">
        <button type="submit" class="btn btn-info px-4 text-white text-bold">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/correspondance-etablissement/form.blade.php ENDPATH**/ ?>