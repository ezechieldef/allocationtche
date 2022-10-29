<?php $__env->startSection('titre'); ?>
    Liste des PV
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Liste des PV
                            </span>

                            <div class="float-right">
                                <a href="<?php echo e(route('pv.create')); ?>"
                                    class="btn btn-warning text-dark text-bold btn-sm float-right" data-placement="left">
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


                                        <th>Code PV</th>
                                        <th>Reference PV</th>
                                        <th>Période</th>
                                        <th>Session</th>
                                        <th>Anneecivile</th>
                                        <th>Nbr Lots</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>


                                            <td><?php echo e($pv->CodePV); ?></td>
                                            <td><?php echo e($pv->Reference_PV); ?></td>
                                            <td><?php echo e($pv->DateDebutSession); ?> à <?php echo e($pv->DateFinSession); ?></td>
                                            <td><?php echo e($pv->Session); ?></td>

                                            <td><?php echo e($pv->AnneeCivile); ?></td>
                                            <td><?php echo e(\App\Models\Lot::where('CodePV', $pv->CodePV)->count()); ?> </td>

                                            <td class="d-flex">
                                                <form action="<?php echo e(route('pv.destroy', $pv->CodePV)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-secondary text-white "
                                                        href="<?php echo e(route('pv.show', $pv->CodePV)); ?>"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <?php if($pv->statut != 'cloturé'): ?>
                                                        <a class="btn btn-sm btn-success text-white"
                                                            href="<?php echo e(route('pv.edit', $pv->CodePV)); ?>"><i
                                                                class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    <?php endif; ?>

                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="btn btn-danger text-white btn-sm show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Supprimer</button>


                                                </form>
                                                <?php if($pv->statut != 'cloturé'): ?>
                                                    <a class="btn btn-sm btn-info text-white text-bold mx-3 "
                                                        href="/cloturer-pv/<?php echo e($pv->CodePV); ?>"
                                                        onclick="(){return confirm('Voulez-vous vraiment confirmer cette cloture ?')}">Cloturer</a>
                                                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/index.blade.php ENDPATH**/ ?>