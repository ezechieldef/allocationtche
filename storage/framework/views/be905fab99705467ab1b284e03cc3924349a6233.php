<script>
    function arrange(noeud) {

        //var ets_select = noeud.getElementById("sel-ets");
        var ets_select = noeud.querySelector("#sel-ets");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;

        //var fil_select = noeud.getElementById("sel-fil");
        var fil_select = noeud.querySelector("#sel-fil");
        var fil_v = fil_select.options[fil_select.selectedIndex].value;


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
        document.getElementById('filiere_acc_id').value = v.value;

    }

    function arrange2() {
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
</script>
<div class="box box-info padding-1">
    <div class="box-body">
        <?php echo $errors->first('CodeFiliere', '<div class="alert alert-danger">:message</div>'); ?>

        <?php echo $errors->first('filiereSelection', '<div class="alert alert-danger">:message</div>'); ?>


        
        <div class="row">
            <div class="col-md-6 col-12">

                <?php echo e(Form::label('Universités')); ?>

                <?php echo e(Form::select('universite', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, [
                    'id' => 'sel-univ',
                    'class' => 'form-select  ' . ($errors->has('universite') ? ' is-invalid' : ''),
                    'placeholder' => '-- Séletionner --',
                    'onchange' => 'arrange2();',
                ])); ?>


            </div>

            <div class="col-md-6 col-12">

                <?php echo e(Form::label('Etablissement ')); ?>

                <select id="sel-ets" class="form-select" onchange="arrange2()">
                    <option value=""> -- Sélectionner -- </option>
                    <?php $__currentLoopData = \App\Models\Etablissement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->CodeEtablissement); ?>" parent='<?php echo e($an->CodeUniversite); ?>' hidden>
                            <?php echo e($an->LibelleEtablissement); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>


        <div class="col-md-12 col-12">
            <div class="form-group">
                <?php echo e(Form::label('Filière ')); ?>


                <select id="sel-fil" class="form-select " onchange="" name="CodeFiliere">
                    <option value=""> --Sélectionner -- </option>

                    <?php $__currentLoopData = \App\Models\Filiere::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->CodeFiliere); ?>" parent='<?php echo e($an->CodeEtablissement); ?>' hidden>
                            <?php echo e($an->LibelleFiliere); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="form-group">
                <?php echo e(Form::label('Correspond à : ')); ?>


                <select id="sel-fil2" class="form-select selectpicker" onchange="change(this)" name="filiereSelection">
                    <option value=""> --Sélectionner -- </option>

                    <?php $__currentLoopData = Illuminate\Support\Facades\DB::select('SELECT distinct R.libfiliere from resultats R '); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->libfiliere); ?>">
                            <?php if(DB::select('SELECT count(*) as nbr from corresp_fil_selection C WHERE C.filiereSelection=? ', [
                                $an->libfiliere,
                            ])[0]->nbr > 0): ?>
                                <strong>
                                    <?php echo e($an->libfiliere); ?> (---- <?php echo e(DB::select('SELECT count(*) as nbr from corresp_fil_selection C WHERE C.filiereSelection=? ', [
                                        $an->libfiliere,
                                    ])[0]->nbr); ?> ----)
                                </strong>
                            <?php else: ?>
                                <?php echo e($an->libfiliere); ?>

                            <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>
    </div>
    <div class="box-footer mt20 w-100">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>

    
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/corresp-fil-selection/form.blade.php ENDPATH**/ ?>