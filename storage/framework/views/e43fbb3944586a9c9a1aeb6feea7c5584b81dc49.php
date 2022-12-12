<?php $__env->startSection('titre'); ?>
    Mes Demandes de Bourse de coopération Chinoise
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="alert alert-info">
        Télécharger le communiqué de la bourse de coopération chinoise en <a href="<?php echo e(asset('communique/chine.pdf')); ?>"
            class="mx-1"> <strong> cliquant ici </strong></a>

    </div>

    <?php if(count($demandesBourseChinoises) == 0): ?>
        <a href="<?php echo e(route('demandes-bourse-chinoise.create')); ?>" class="btn btn-warning text-dark w-100 my-3 fw-bold">Faire
            une demande de bourse de coopération chinoise</a>
        <div class="">
            <img src="<?php echo e(asset('communique/cm1.jpg')); ?>" class="w-100 shadow my-2" alt="">
            <img src="<?php echo e(asset('communique/cm2.jpg')); ?>" class="w-100 shadow my-2" alt="">
            <img src="<?php echo e(asset('communique/cm3.jpg')); ?>" class="w-100 shadow my-2" alt="">
            <img src="<?php echo e(asset('communique/cm4.jpg')); ?>" class="w-100 shadow my-2" alt="">
        </div>
    <?php else: ?>
        <div class=" my-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    <?php echo e(__('Demandes Bourse Chinoise')); ?>

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



                                            <th>Nom & Prénoms</th>
                                            <th>Date Naissance</th>
                                            <th>Diplome de base </th>

                                            <th>Whatsapp</th>
                                            <th>Niveau & Filière sollicité</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                        ?>
                                        <?php $__currentLoopData = Auth::user()->demandesBourseChinoise(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandesBourseChinoise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>



                                                <td><?php echo e($demandesBourseChinoise->nom . ' ' . $demandesBourseChinoise->prenoms); ?>

                                                </td>
                                                <td><?php echo e($demandesBourseChinoise->date_naissance); ?></td>
                                                <td><?php echo e($demandesBourseChinoise->diplome_de_base . ' | ' . $demandesBourseChinoise->serie_ou_filiere); ?>

                                                </td>

                                                <td><?php echo e($demandesBourseChinoise->contact_whatsapp); ?></td>
                                                <td><?php echo e($demandesBourseChinoise->niveau_sollicite . ' | ' . $demandesBourseChinoise->filiere_choisi); ?>

                                                </td>

                                                <td>
                                                    <form
                                                        action="<?php echo e(route('demandes-bourse-chinoise.destroy', $demandesBourseChinoise->id)); ?>"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-info text-white "
                                                            href="<?php echo e(route('demandes-bourse-chinoise.show', $demandesBourseChinoise->id)); ?>"><i
                                                                class="fa fa-fw fa-eye"></i> Imprimer</a>
                                                        <?php if(!$demandesBourseChinoise->imprime): ?>
                                                            <a class="btn btn-sm btn-success text-white"
                                                                href="<?php echo e(route('demandes-bourse-chinoise.edit', $demandesBourseChinoise->id)); ?>"><i
                                                                    class="fa fa-fw fa-edit"></i> Modifier</a>
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                                    class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                        <?php endif; ?>

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
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/demandes-bourse-chinoise/index.blade.php ENDPATH**/ ?>