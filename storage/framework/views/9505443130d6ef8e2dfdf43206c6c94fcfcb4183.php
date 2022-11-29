<?php $__env->startSection('titre'); ?>
    Utilisateurs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sous-titre'); ?>
    Administrateur
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Liste des Utilisateurs')); ?>

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
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Npi</th>
                                        <th>Contact</th>
                                        <th>Roles</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->id); ?></td>

                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->NPI); ?></td>
                                            <td><?php echo e($user->contact); ?></td>
                                            <td><?php echo e(implode(' | ',$user->getRoleNames()->toArray())); ?></td>


                                            <td>
                                                <form action="<?php echo e(route('utilisateur.destroy', $user->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="<?php echo e(route('utilisateur.show', $user->id)); ?>"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    
                                                    
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/user/index.blade.php ENDPATH**/ ?>