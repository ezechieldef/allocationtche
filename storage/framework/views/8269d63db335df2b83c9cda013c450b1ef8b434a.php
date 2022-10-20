<?php $__env->startSection('titre'); ?>
    Taux
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Taux')); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('taux.create')); ?>" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Nouveau
                                </a>
                              </div>
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
                                        <th>ID</th>
										<th>Code Filiere</th>
										<th>Année d'étude</th>
										<th>Nature Allocation</th>
										<th>Code Année Academique</th>
										<th>Taux Allocation</th>
										<th>Accessoire Allocation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $tauxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taux): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>


											<td><?php echo e($taux->CodeTaux); ?></td>
											<td><?php echo e($taux->CodeFiliere); ?></td>
											<td><?php echo e($taux->CodeAnneeEtude); ?></td>
											<td><?php echo e($taux->CodeNatureAllocation); ?></td>
											<td><?php echo e(\App\Models\AnneeAcademique::find($taux->CodeAnneeAcademique)->LibelleAnneeAcademique); ?></td>
											<td><?php echo e($taux->TauxAllocation); ?></td>
											<td><?php echo e($taux->AccessoireAllocation); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('taux.destroy',$taux->CodeTaux)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="<?php echo e(route('taux.show',$taux->CodeTaux)); ?>"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="<?php echo e(route('taux.edit',$taux->CodeTaux)); ?>"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/taux/index.blade.php ENDPATH**/ ?>