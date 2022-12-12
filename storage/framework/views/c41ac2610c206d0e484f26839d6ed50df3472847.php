<?php $__env->startSection('template_title'); ?>
    Correspondance Temporaire
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <?php echo e(__('Correspondance Filiere')); ?>

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
                        <form action="/correspondance-temporaire" method="post">
                            <?php echo csrf_field(); ?>
                            <table class="table table-striped table-hover " id="mytable">
                                <thead class="thead">
                                    <tr>
                                        <th>
                                            <i class="fa fa-check text-success"></i>
                                        </th>
                                        <th>ID</th>
                                        <th>Université</th>
                                        <th>Etablissement</th>
                                        <th>Filiere</th>
                                        <th>Correspond à (Proposition)</th>
                                        <th>
                                            <i class="fa fa-close text-danger"></i>
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $prop_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correspondanceFiliere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="valider[]"
                                                    value="<?php echo e($correspondanceFiliere->id); ?>">
                                            </td>
                                            <td><?php echo e($correspondanceFiliere->id); ?></td>
                                            <td><?php echo e($correspondanceFiliere->filiere1()->first()->etablissement()->first()->universite()->first()->CodeUniversite); ?>

                                            </td>
                                            <td><?php echo e($correspondanceFiliere->filiere1()->first()->etablissement()->first()->LibelleEtablissement); ?>

                                            </td>

                                            <td><?php echo e($correspondanceFiliere->filiere1()->first()->LibelleFiliere); ?></td>
                                            <td><?php echo e($correspondanceFiliere->filiere2()->first()->LibelleFiliere); ?></td>
                                            <td>
                                                <input type="checkbox" name="rejeter[]"
                                                    value="<?php echo e($correspondanceFiliere->id); ?>">
                                            </td>
                                            


                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                            <div class="row">
                                <div class="col-md-12 col-12 text-center my-3">
                                    <button type="submit" class="btn btn-warning text-dark w-100 "> Valider Correspondance / Supprimer Proposition de correspondance </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/correspondance-filiere/corresp_temp.blade.php ENDPATH**/ ?>