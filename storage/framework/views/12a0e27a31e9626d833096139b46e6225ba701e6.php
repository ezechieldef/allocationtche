<script>
    function arrange() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("sel-ets");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;

        var fil_select = document.getElementById("sel-fil");
        var fil_v = fil_select.options[fil_select.selectedIndex].value;

        //console.log(univ_select.options);
        //enfant


        if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select.value = '';
            fil_select.value = '';

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

        //sous enfant

        if (fil_select.options[fil_select.selectedIndex].getAttribute("parent") != ets_v) {
            fil_select.value = '';
        }

        for (var i = 0; i < fil_select.options.length; i++) {

            if (fil_select.options[i].getAttribute("parent") != ets_v) {
                fil_select.options[i].setAttribute("hidden", '');
            } else {
                fil_select.options[i].removeAttribute("hidden");
            }
        }

    }

    function change(v) {
        // document.getElementById('filiere_acc_id').value = v.value;

    }
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <?php echo e(Form::label('Universités')); ?>

                    <?php echo e(Form::select(
                        'CodeUniversite',
                        \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'),
                        null,
                        [
                            'id' => 'sel-univ',
                            'class' => 'form-select  ' . ($errors->has('CodeUniversite') ? ' is-invalid' : ''),
                            'placeholder' => '-- Séletionner --',
                            'onchange' => 'arrange();',
                        ],
                    )); ?>

                    <?php echo $errors->first('CodeUniversite', '<div class="invalid-feedback">:message</div>'); ?>

                </div>
            </div>


            <div class="col-md-6 col-12">

                <div class="form-group">
                    <?php echo e(Form::label('Etablissement ')); ?>

                    <select id="sel-ets" class="form-select" onchange="arrange()" name="CodeEtablissement">
                        <option value=""> -- Sélectionner -- </option>
                        <?php $__currentLoopData = \App\Models\Etablissement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($an->CodeEtablissement); ?>" parent='<?php echo e($an->CodeUniversite); ?>' hidden>
                                <?php echo e($an->LibelleEtablissement); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <?php echo e(Form::label('Filière ')); ?>

                    <select id="sel-fil" class="form-select <?php echo e(($errors->has('CodeFiliere') ? ' is-invalid' : '')); ?>" onchange="change(this)" name="CodeFiliere">
                        <option value=""> --Sélectionner -- </option>
                        <?php $__currentLoopData = \App\Models\Filiere::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($an->CodeFiliere); ?>" parent='<?php echo e($an->CodeEtablissement); ?>' hidden>
                                <?php echo e($an->LibelleFiliere); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php echo $errors->first('CodeFiliere', '<div class="invalid-feedback">:message</div>'); ?>

                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <?php echo e(Form::label('Année d\'étude')); ?>

                    <?php echo e(Form::select('CodeAnneeEtude', \App\Models\AnneeEtude::pluck('CodeAnneeEtude', 'CodeAnneeEtude'), $taux->CodeAnneeEtude, ['class' => 'form-select' . ($errors->has('CodeAnneeEtude') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                    <?php echo $errors->first('CodeAnneeEtude', '<div class="invalid-feedback">:message</div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo e(Form::label('Nature Allocation')); ?>

                    <?php echo e(Form::select('CodeNatureAllocation', App\Models\NatureAllocation::pluck('LibelleNatureAllocation', 'CodeNatureAllocation'), $taux->CodeNatureAllocation, ['class' => 'form-select' . ($errors->has('CodeNatureAllocation') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                    <?php echo $errors->first('CodeNatureAllocation', '<div class="invalid-feedback">:message</div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo e(Form::label('Année Académique')); ?>

                    <?php echo e(Form::select('CodeAnneeAcademique', App\Models\AnneeAcademique::pluck('LibelleAnneeAcademique', 'CodeAnneeAcademique'), $taux->CodeAnneeAcademique, ['class' => 'form-select' . ($errors->has('CodeAnneeAcademique') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                    <?php echo $errors->first('CodeAnneeAcademique', '<div class="invalid-feedback">:message</div>'); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('Taux Allocation')); ?>

                <?php echo e(Form::number('TauxAllocation', $taux->TauxAllocation, ['class' => 'form-control' . ($errors->has('TauxAllocation') ? ' is-invalid' : ''), 'placeholder' => 'Tauxallocation'])); ?>

                <?php echo $errors->first('TauxAllocation', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('Accessoire Allocation')); ?>

                <?php echo e(Form::number('AccessoireAllocation', $taux->AccessoireAllocation, ['class' => 'form-control' . ($errors->has('AccessoireAllocation') ? ' is-invalid' : ''), 'placeholder' => 'Accessoireallocation'])); ?>

                <?php echo $errors->first('AccessoireAllocation', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-white text-bold w-100">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/taux/form.blade.php ENDPATH**/ ?>