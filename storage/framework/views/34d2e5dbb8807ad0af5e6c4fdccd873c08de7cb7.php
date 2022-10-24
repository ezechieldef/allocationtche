<?php $__env->startSection('titre'); ?>
    Créer PV
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Créer un PV</span>
                        <div class="float-right">
                            <a href="<?php echo e(route('pv.index')); ?>" class="btn btn-warning text-dark text-bold btn-sm float-right"  data-placement="left">
                              Retour
                            </a>
                          </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('pv.store')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('pv.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/create.blade.php ENDPATH**/ ?>