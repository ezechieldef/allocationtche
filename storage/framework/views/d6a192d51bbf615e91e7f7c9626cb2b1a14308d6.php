<?php $__env->startSection('template_title'); ?>
    Correspondance Etablissement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <p>
            <button class="btn btn-success text-white text-bold w-100" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Nouvelle Correspondance
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card ">
                <div class="card-header">
                    <span class="card-title">Formulaire Correspondance Etablissement</span>
                </div>
                <?php
                    $correspondanceEtablissement = new App\Models\CorrespondanceEtablissement();
                ?>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('correspondance-etablissement.store')); ?>" role="form"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('correspondance-etablissement.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Correspondance Etablissement')); ?>

                            </span>

                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead class="thead">
                                    <tr>


                                        <th>Universit??</th>
                                        <th>Etablissement</th>
                                        <th>Correspond ??</th>
                                        <th>Synonymes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $correspondanceEtablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correspondanceEtablissement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($correspondanceEtablissement->etablissement1()->first()->universite()->first()->LibelleLongUniversite); ?>

                                            </td>
                                            <td><?php echo e($correspondanceEtablissement->etablissement1()->first()->LibelleEtablissement); ?>

                                            </td>
                                            <td><?php echo e($correspondanceEtablissement->etablissement2()->first()->LibelleEtablissement); ?>

                                            </td>
                                            <td>
                                                <?php $__currentLoopData = $correspondanceEtablissement->synonymes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="btn btn-light shadow-sm">
                                                        <?php echo e($syn['CodeEtablissement']); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>

                                            <td>
                                                <form
                                                    action="<?php echo e(route('correspondance-etablissement.destroy', $correspondanceEtablissement->id)); ?>"
                                                    method="POST">

                                                    <a class="btn btn-sm btn-success text-white"
                                                        href="<?php echo e(route('correspondance-etablissement.edit', $correspondanceEtablissement->id)); ?>"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/correspondance-etablissement/index.blade.php ENDPATH**/ ?>