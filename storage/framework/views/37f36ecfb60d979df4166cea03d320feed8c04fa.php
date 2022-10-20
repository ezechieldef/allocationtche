<script>
    function regexcheck(v) {
        var t =
            <?php
                echo json_encode(\App\Models\Banque::pluck('regex', 'LibellecourtBanque')->toArray());
            ?>;
        var debut =
            <?php
                echo json_encode(\App\Models\Banque::pluck('format', 'LibellecourtBanque')->toArray());
            ?>;

        var rib = document.getElementById('RIB');
        if (t[v] != undefined) {
            rib.setAttribute("pattern", t[v]);
            rib.setAttribute("title", 'les RIB commence par ' + debut[v] + ' à ' + v);
        } else {
            rib.removeAttribute("pattern");
            rib.removeAttribute("title");
        }

    }
</script>


<?php $__env->startSection('content'); ?>
<div class="alert alert-info font-weight-bold">
    <strong>Assurez-vous d'être le titulaire de ces données , puis remplisser le formulaire se trouvant complètement en bas de la page</strong>
</div>
        <div class="card">
            <div class="card-header">
                Information de l'étudiant
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2 col-12 my-2">
                        <label for="">Matricule</label>
                        <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->Matricule); ?>">
                    </div>
                    <div class="col-md-4 col-12 my-2">
                        <label for="">Nom</label>
                        <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->NomEtudiant); ?>">
                    </div>
                    <div class="col-md-6 col-12 my-2">
                        <label for="">Prénoms</label>
                        <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->PrenomEtudiant); ?>">
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <label for="">Date de Naissance : </label>
                        <input type="text" readonly class="form-control"
                            value="<?php echo e($demTemp[0]->DateNaissanceEtudiant); ?>">
                    </div>
                    <div class="col-md-4 col-12 my-2">
                        <label for="">Lieu de Naissance : </label>
                        <input type="text" readonly class="form-control"
                            value="<?php echo e($demTemp[0]->LieuNaissanceEtudiant); ?>">
                    </div>
                    <div class="col-md-1 col-12 my-2">
                        <label for="">Sexe : </label>
                        <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->SexeEtudiant); ?>">
                    </div>
                    <div class="col-md-4 col-12 my-2">
                        <label for="">Université : </label>
                        <input type="text" readonly class="form-control" value="<?php echo e($demTemp[0]->CodeUniversite); ?>">
                    </div>
                </div>
                <div class="text-center mt-5 mb-2 card-header rounded "> <strong>Demande à faire </strong> </div>
                <div class="table-responsive">
                    <table class="table text-center " id="mytable">
                        <thead>
                            <th></th>
                            <th>Année Académique</th>
                            <th>Université</th>
                            <th>Etablissement</th>
                            <th>Filière</th>
                            <th>Année d'Étude</th>
                            <th>Type de demande</th>

                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $demTemp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd dt-hasChild parent text-center">
                                    <td>
                                        <i class="fa fa-check text-success"></i>
                                    </td>
                                    <td><?php echo e(\App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique)->LibelleAnneeAcademique); ?>

                                    </td>
                                    <td><?php echo e($dem->CodeUniversite); ?></td>
                                    <td><?php echo e($dem->CodeEtablissement); ?></td>
                                    <td><?php echo e($dem->CodeFiliere); ?></td>
                                    <td><?php echo e($dem->CodeAnneeEtude); ?></td>
                                    <td><?php echo e($dem->CodeTypeDemande); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center text-bold text-danger">
                    Remplissez le formulaire ci-dessous pour finaliser
                    <?php echo e(count($demTemp) > 1 ? 'ces ' . count($demTemp) . ' demandes' : 'votre demande'); ?>

                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h4 class="text-center text-white">Finaliser votre demande</h4>
            </div>
            <div class="card-body">
                <form action="/step2" method="post">
                    <div class="row">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-4 col-12 my-2">
                            <?php echo e(Form::label('Banque')); ?>

                            <?php echo e(Form::select('Banque', App\Models\Banque::pluck('LibellecourtBanque', 'CodeBanque'), null, [
                                'id' => 'banque',
                                'onchange' => 'regexcheck(this.value);',
                                'required' => 'required',
                                'class' => 'form-select ' . ($errors->has('Banque') ? ' is-invalid' : ''),
                                'placeholder' => '-- Sélectionner --',
                            ])); ?>

                        </div>

                        <div class="col-md-8 col-12 my-2">
                            <?php echo e(Form::label('RIB')); ?>

                            <?php echo e(Form::text('RIB', null, ['id' => 'RIB', 'class' => 'form-control' . ($errors->has('RIB') ? ' is-invalid' : ''), 'placeholder' => 'RIB', 'required' => 'required'])); ?>

                            <?php echo $errors->first('RIB', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>
                        <div class="col-md-6 col-12 my-2">
                            <?php echo e(Form::label('Telephone')); ?>

                            <?php echo e(Form::tel('Telephone', null, ['min' => '8', 'max' => '8', 'required' => 'required', 'class' => 'form-control' . ($errors->has('Telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telephone'])); ?>

                            <?php echo $errors->first('Telephone', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>
                        <div class="col-md-6 col-12 my-2">
                            <?php echo e(Form::label('NPI')); ?>

                            <?php echo e(Form::number('NPI', null, ['minlength' => '9', 'maxlength' => '12', 'required' => 'required', 'class' => 'form-control' . ($errors->has('NPI') ? ' is-invalid' : ''), 'placeholder' => 'NPI'])); ?>

                            <?php echo $errors->first('NPI', '<div class="invalid-feedback">:message</div>'); ?>

                        </div>

                    </div>

                    <div class="text-center">
                        <button class="btn btn-success my-3 px-5 text-bold text-white">Soumettre</button>
                    </div>
                </form>

            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/step2.blade.php ENDPATH**/ ?>