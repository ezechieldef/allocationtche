<?php $__env->startSection('titre'); ?>
    Liste des demandes d'allocation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">Liste </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="mytable">
                    <thead>
                        <th>Code</th>
                        <th>Matricule</th>
                        <th>Nom & Prénoms</th>
                        <th>Filiere</th>
                        <th>Type</th>
                        <th>Nature</th>
                        <th>Année Aca. / Niveau</th>
                        <th>Id Transaction</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $dem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($demande->CodeDemandeAllocation); ?>

                                </td>
                                <td class="text-dark"><?php echo e($demande->Matricule); ?></td>
                                <td><?php echo e($demande->NomEtudiant . ' ' . $demande->PrenomEtudiant); ?></td>
                                <td><strong class="text-dark"> <?php echo e($demande->CodeFiliere); ?></strong></td>
                                <td class="text-info"> <?php echo e($demande->CodeTypeDemande); ?></td>
                                <td> <?php echo e($demande->CodeNatureAllocation); ?></td>
                                <td> <?php echo e(\App\Models\AnneeAcademique::find($demande->CodeAnneeAcademique)->LibelleAnneeAcademique); ?> / <?php echo e($demande->CodeAnneeEtude); ?></td>
                                <td><?php echo e($demande->idtransaction); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/les_demandes.blade.php ENDPATH**/ ?>