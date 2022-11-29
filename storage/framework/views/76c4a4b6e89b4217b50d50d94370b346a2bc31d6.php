<?php $__env->startSection('template_title'); ?>
    Corresp Fil Selection
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Corresp Fil Selection')); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('correspondance-fil-selection.create')); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Codefiliere</th>
										<th>Filiereselection</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $correspFilSelections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correspFilSelection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>

											<td><?php echo e($correspFilSelection->CodeFiliere); ?></td>
											<td><?php echo e($correspFilSelection->filiereSelection); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('correspondance-fil-selection.destroy',$correspFilSelection->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="<?php echo e(route('correspondance-fil-selection.show',$correspFilSelection->id)); ?>"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="<?php echo e(route('correspondance-fil-selection.edit',$correspFilSelection->id)); ?>"><i class="fa fa-fw fa-edit"></i> Modifier</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/corresp-fil-selection/index.blade.php ENDPATH**/ ?>