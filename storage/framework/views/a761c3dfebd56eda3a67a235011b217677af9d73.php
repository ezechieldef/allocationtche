<?php $__env->startSection('titre'); ?>
    Derogation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Derogation')); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('derogations.create')); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>

										<th>Matricule</th>
										<th>Nometudiant</th>
										<th>Prenometudiant</th>
										<th>Datenaissanceetudiant</th>
										<th>Universite</th>
										<th>Etablissement</th>
										<th>Filiere</th>
										<th>Annee Etude</th>

										<th>Statut allocataire</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $derogations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $derogation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>

											<td><?php echo e($derogation->Matricule); ?></td>
											<td><?php echo e($derogation->NomEtudiant); ?></td>
											<td><?php echo e($derogation->PrenomEtudiant); ?></td>
											<td><?php echo e($derogation->DateNaissanceEtudiant); ?></td>

											<td><?php echo e($derogation->CodeUniversite); ?></td>
											<td><?php echo e($derogation->CodeEtablissement); ?></td>
											<td><?php echo e($derogation->CodeFiliere); ?></td>
											<td><?php echo e($derogation->CodeAnneeEtude); ?></td>

											<td><?php echo e($derogation->StatutAllocataire); ?></td>


                                            <td>
                                                <form action="<?php echo e(route('derogations.destroy',$derogation->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="<?php echo e(route('derogations.show',$derogation->id)); ?>"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="<?php echo e(route('derogations.edit',$derogation->id)); ?>"><i class="fa fa-fw fa-edit"></i> Modifier</a>
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
                <?php echo $derogations->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/derogation/index.blade.php ENDPATH**/ ?>