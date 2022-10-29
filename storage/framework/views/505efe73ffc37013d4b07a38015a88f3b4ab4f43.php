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

                        <div class="form-group">
                            <strong>Codepv:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->CodePV); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Reference PV:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->Reference_PV); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Datedebutsession:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->DateDebutSession); ?>">
                        </div>

                        <div class="form-group">
                            <strong>Datefinsession:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->DateFinSession); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Anneecivile:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->AnneeCivile); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Notebaspage:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->NoteBasPage); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Datetransmissionliste:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->DateTransmissionListe); ?>">
                        </div>
                        <div class="form-group">
                            <strong>Reflettretransmisionliste:</strong>
                            <input type="text" readonly class="form-control" value="<?php echo e($pv->RefLettreTransmisionListe); ?>">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/show.blade.php ENDPATH**/ ?>