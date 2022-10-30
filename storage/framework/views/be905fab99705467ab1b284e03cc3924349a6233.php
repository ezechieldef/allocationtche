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


                <select id="sel-fil2" class="form-select" onchange="change(this)" name="filiereSelection">
                    <option value=""> --Sélectionner -- </option>

                    <?php $__currentLoopData = Illuminate\Support\Facades\DB::select('SELECT distinct R.libfiliere from resultats R '); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($an->libfiliere); ?>">
                            <?php echo e($an->libfiliere); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>

    <p class="my-5">
        <button class="btn btn-primary text-white text-bold w-100" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            Liste des Filières de sélection, n'ayant pas de correspondance.
        </button>
    </p>
    <div class="collapse" id="collapseExample2">
        <table class="table table-responsive" id="datatable">
            <thead>
                <th>Université Sélection</th>
                <th>Etablissement Sélection</th>
                <th>Filière Sélection</th>
                <th>Filière</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = Illuminate\Support\Facades\DB::select('SELECT distinct R.libfiliere, R.etablissementSelection, R.universiteSelection  , R.CodeUniversite from resultats R
                WHERE R.etablissementSelection NOT IN (SELECT C.filiereSelection from corresp_fil_selection C ) '); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($sel->universiteSelection); ?></td>
                        <td><?php echo e($sel->etablissementSelection); ?></td>
                        <td><?php echo e($sel->libfiliere); ?></td>
                        <td>

                            <form method="POST" action="<?php echo e(route('correspondance-fil-selection.store')); ?>"
                                role="form" enctype="multipart/form-data" class="d-flex">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="filiereSelection" value="<?php echo e($sel->libfiliere); ?>"
                                    class="hide">
                                <?php echo e(Form::select(
                                    'CodeEtablissement1',
                                    App\Models\Etablissement::where('CodeUniversite', $sel->CodeUniversite)->pluck(
                                        'LibelleEtablissement',
                                        'CodeEtablissement',
                                    ),
                                    null,
                                    [
                                        'id' => 'sel-ets',
                                        'onchange' => 'arrange(this.parentNode);',
                                        'class' => 'form-select',
                                        'placeholder' => '-- Etablissement --',
                                        'required' => 'required',
                                    ],
                                )); ?>



                                <select id="sel-fil" class="form-select mx-1" onchange="" name="CodeFiliere"
                                    required>
                                    <option value=""> --Filière -- </option>

                                    <?php $__currentLoopData = \App\Models\Filiere::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($an->CodeFiliere); ?>" parent='<?php echo e($an->CodeEtablissement); ?>'
                                            hidden>
                                            <?php echo e($an->LibelleFiliere); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <button type="submit" class="btn btn-success btn-sm mx-3">Valider</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/corresp-fil-selection/form.blade.php ENDPATH**/ ?>