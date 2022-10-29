<?php $__env->startSection('template_title'); ?>
    Détail PV
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail PV</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning text-dark" href="<?php echo e(route('pv.index')); ?>"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-2 col-12 my-2">
                                <strong>Code PV:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->CodePV); ?>">
                            </div>
                            <div class="col-md-4 col-12 my-2">
                                <strong>Reference PV:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->Reference_PV); ?>">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Datedebutsession:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->DateDebutSession); ?>">
                            </div>

                            <div class="col-md-3 col-12 my-2">
                                <strong>Datefinsession:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->DateFinSession); ?>">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Anneecivile:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->AnneeCivile); ?>">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Notebaspage:</strong>
                                <input type="text" readonly class="form-control" value="<?php echo e($pv->NoteBasPage); ?>">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Date Transmission Liste:</strong>
                                <input type="text" readonly class="form-control"
                                    value="<?php echo e($pv->DateTransmissionListe); ?>">
                            </div>
                            <div class="col-md-3 col-12 my-2">
                                <strong>Ref lettre Transmisionliste:</strong>
                                <input type="text" readonly class="form-control"
                                    value="<?php echo e($pv->RefLettreTransmisionListe); ?>">
                            </div>
                        </div>

                        <div class="bg-gray-200 text-dark text-bold text-center py-2 my-3">
                            Statistique
                        </div>
                        <?php
                            $i = 0;
                        ?>
                        <ul>

                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $an => $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="h5">Année Académique : <strong><?php echo e($an); ?></strong></div>
<ul>
                                    <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $univ=>$data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><div class="h6 text-center ">Université : <strong><?php echo e($univ); ?></strong></div></li>

                                        <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nature=>$data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <table class="table">
                                            <tr class="bg-gray-200">
                                                <td colspan="5" class="text-center bg-gray-200" ><?php echo e($nature); ?></td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td>Etablissements</td>
                                                <td>Nombre de Demandes</td>
                                                <td>Favorable</td>
                                                <td>Défavorable</td>
                                                <td>Réservé</td>
                                            </tr>
                                            <tbody>
                                                <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($ets->LibelleEtablissement); ?></td>
                                                        <td><?php echo e($ets->nbr); ?></td>
                                                        <td><?php echo e($ets->nbr_fav); ?></td>
                                                        <td><?php echo e($ets->nbr_def); ?></td>
                                                        <td><?php echo e($ets->nbr_res); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/show.blade.php ENDPATH**/ ?>