<?php $__env->startSection('titre'); ?>
    Mettre à jour Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sous-titre'); ?>
    Modification
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Profile</span>

                        <div class="float-right">
                            <a class="btn btn-primary back-btn"> Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('utilisateur.update', $user->id)); ?>" role="form"
                            enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('user.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                        <div class="row">
                            <?php
                                $tab = [['name' => 'npi_url', 'label' => 'CIP Scanné au format PDF']];
                            ?>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/user/edit.blade.php ENDPATH**/ ?>