<?php $__env->startSection('titre'); ?>
    Consulter
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">Formulaire </div>
        <div class="card-body">
            <form action="/consulter" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-12 my-2">
                        <label for="">Université</label>
                        <?php echo e(Form::select('Universite', App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, ['required' => 'required', 'class' => 'form-select', 'placeholder' => '-- Sélectionner --'])); ?>

                    </div>

                    <div class="col-md-6 col-12 my-2">
                        <?php echo e(Form::label('Matricule')); ?>

                        <?php echo e(Form::text('Matricule', null, ['class' => 'form-control' . ($errors->has('Matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule', 'required' => 'required'])); ?>

                        <?php echo $errors->first('Matricule', '<div class="invalid-feedback">:message</div>'); ?>

                    </div>

                    <div class="text-center">
                        <button class="btn btn-success my-3 px-5 text-white text-bold ">Soumettre</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <?php if(!is_null($list ?? null)): ?>
        <?php if(count($list) == 0): ?>
            <div class="text-center my-5 py-5">
                <i class="fa fa-close text-danger" style="font-size: 60px"></i>
                <h2>Aucune données trouvé pour ces informations</h2>

            </div>
        <?php else: ?>
            <div class="card">
                <div class="card-header">Résultats</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <th></th>
                                <th>Matricule</th>
                                <th>Nom & Prénoms</th>
                                <th>Date Naiss.</th>
                                <th>Filière</th>
                                <th>Année Aca. / Niveau </th>
                                <th>Nature </th>
                                <th>Banque </th>
                                <th>RIB </th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td>
                                            <?php if($dem->CodeTypeDemande == ''): ?>
                                                <i class="fa fa-check text-success"></i>
                                            <?php else: ?>
                                                <i class="fa fa-close text-danger"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-dark"><?php echo e($dem->Matricule); ?></td>
                                        <td><?php echo e($dem->NomEtudiant . ' ' . $dem->PrenomEtudiant); ?></td>
                                        <td class=""> <?php echo e($dem->DateNaissanceEtudiant); ?></td>
                                        <td><strong class="text-dark"> <?php echo e($dem->CodeFiliere); ?></strong></td>
                                        <td> <?php echo e(\App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique ?? $dem->Annee)->LibelleAnneeAcademique); ?>

                                            / <?php echo e($dem->CodeAnneeEtude); ?></td>
                                        <td> <?php echo e($dem->CodeNatureAllocation ?? $dem->StatutAllocataire); ?></td>
                                        <td> <?php echo e($dem->CodeBanque); ?></td>
                                        <td> <?php echo e($dem->RIB); ?></td>


                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/consulter.blade.php ENDPATH**/ ?>