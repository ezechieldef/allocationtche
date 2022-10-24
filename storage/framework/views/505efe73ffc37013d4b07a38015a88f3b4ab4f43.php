<?php $__env->startSection('template_title'); ?>
    <?php echo e($pv->name ?? 'Show Pv'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pv</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(route('pv.index')); ?>"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codepv:</strong>
                            <?php echo e($pv->CodePV); ?>

                        </div>
                        <div class="form-group">
                            <strong>Reference Pv:</strong>
                            <?php echo e($pv->Reference_PV); ?>

                        </div>
                        <div class="form-group">
                            <strong>Datedebutsession:</strong>
                            <?php echo e($pv->DateDebutSession); ?>

                        </div>
                        <div class="form-group">
                            <strong>Session:</strong>
                            <?php echo e($pv->Session); ?>

                        </div>
                        <div class="form-group">
                            <strong>Datefinsession:</strong>
                            <?php echo e($pv->DateFinSession); ?>

                        </div>
                        <div class="form-group">
                            <strong>Anneecivile:</strong>
                            <?php echo e($pv->AnneeCivile); ?>

                        </div>
                        <div class="form-group">
                            <strong>Notebaspage:</strong>
                            <?php echo e($pv->NoteBasPage); ?>

                        </div>
                        <div class="form-group">
                            <strong>Datetransmissionliste:</strong>
                            <?php echo e($pv->DateTransmissionListe); ?>

                        </div>
                        <div class="form-group">
                            <strong>Reflettretransmisionliste:</strong>
                            <?php echo e($pv->RefLettreTransmisionListe); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/show.blade.php ENDPATH**/ ?>