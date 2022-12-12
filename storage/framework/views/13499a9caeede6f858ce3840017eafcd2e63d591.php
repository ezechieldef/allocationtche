<?php $__env->startSection('content'); ?>
<div class="row my-3">
    <div class="col-md-6 col-12 my-2">
        <strong>Nombre total d'utilisateur</strong>
        <input type="text" readonly class="form-control" value="<?php echo e(\App\Models\User::all()->count()); ?>">
    </div>
    <div class="col-md-6 col-12 my-2">
        <strong>Nombre Total de dmande </strong>
        <input type="text" readonly class="form-control" value="<?php echo e(\App\Models\DemandeAllocationUPB::all()->count()); ?>">
    </div>
</div>
    <div class="card">
        <div class="card-header">
            Statistique Simplifié
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100">
                    <thead class="text-dark">
                        <th>Université</th>
                        <th>Bourses</th>
                        <th>Aides</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = \App\Models\Universite::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $univ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($univ->CodeUniversite); ?>

                                </td>
                                <td><?php echo e(DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                            AND D.CodeNatureAllocation LIKE "B%" ',
                                    [$univ->CodeUniversite],
                                )[0]->nb); ?>

                                </td>
                                <td><?php echo e(DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                            AND D.CodeNatureAllocation LIKE "A%" ',
                                    [$univ->CodeUniversite],
                                )[0]->nb); ?>

                                </td>
                                <td><?php echo e(DB::select(
                                    'SELECT COUNT(*) as nb from demande_allocation D, etudiant E, filiere F, etablissement Ets
                                                                        WHERE E.CodeEtudiant=D.CodeEtudiant AND E.CodeFiliere=F.CodeFiliere AND F.CodeEtablissement=Ets.CodeEtablissement AND Ets.CodeUniversite=?
                                                                            ',
                                    [$univ->CodeUniversite],
                                )[0]->nb); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/preview.blade.php ENDPATH**/ ?>