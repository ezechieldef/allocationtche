<?php $__env->startSection('titre'); ?>
    Liste Lot
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Lot')); ?>

                            </span>

                            <div class="float-right">
                                <a href="<?php echo e(route('lots.create')); ?>" class="btn btn-warning text-dark btn-sm float-right"
                                    data-placement="left">
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
                                        <td>ID</td>
                                        <th>Numero</th>
                                        <th>Référence PV</th>
                                        <th>Commissaire</th>
                                        <th>Nbr Demande</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($lot->CodeLot); ?></td>
                                            <td><?php echo e($lot->Numero); ?></td>
                                            <td><?php echo e(\App\Models\Pv::find($lot->CodePV)->Reference_PV); ?></td>
                                            <td><?php echo e(\App\Models\User::find($lot->Commissaire)->name); ?></td>
                                            <td><?php echo e(\App\Models\AssocLotsDemande::where('CodeLot', $lot->CodeLot)->count()); ?></td>
                                            <td><?php echo e($lot->status); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('lots.destroy', $lot->CodeLot)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-info text-white "
                                                        href="<?php echo e(route('lots.show', $lot->CodeLot)); ?>"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <?php if(auth()->check() && auth()->user()->hasRole('super-admin')): ?>
                                                        <a class="btn btn-sm btn-success text-white"
                                                            href="<?php echo e(route('lots.edit', $lot->CodeLot)); ?>"><i
                                                                class="fa fa-fw fa-edit"></i> Modifier</a>
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                                class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                    <?php endif; ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $lots->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/lot/index.blade.php ENDPATH**/ ?>