<h4 class="mt-3">Pièces Jointe</h4>


<?php if(count(App\Models\PieceJointeRussie::whereNotIn(
        'id',
        \App\Models\AssocPJRussie::where('demande_id', $demandesBourseRussie->id)->get(['piece_jointe'])->toArray())->get()) > 0): ?>
    <div class="alert alert-info mt-4">
        <strong>Astuce : </strong> Vous pouvez utiliser l'application <strong>CamScanner</strong>
        pour scanner les documents plus facilement. <a
            href="https://play.google.com/store/apps/details?id=com.intsig.camscanner&hl=fr&gl=US"
            target="_blank">Télécharger
            sur Playstore</a>
    </div>
<?php else: ?>
    <a href="/pdf-bourse-russie/<?php echo e($demandesBourseRussie->id); ?>">
        <div class="alert alert-success">
            <i class="fa fa-download " style="margin-right : 3px"></i> Télécharger fiche
            d'inscription
        </div>
        <div class="text-danger"><strong>Attention :</strong> Une fois télécharger, plus aucune
            correction ou modification n'est possible pour votre demande </div>
    </a>
<?php endif; ?>

<ul class="list-group  mt-3 mb-2" id="uil">

    <?php $__empty_1 = true; $__currentLoopData = App\Models\PieceJointeRussie::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        
        <?php
            $assocPJdemande = $demandesBourseRussie->pjID($pj->id)->first() ?? null;
            // $lien_doc = $assocPJdemande == null ? null : $assocPJdemande->where('user_id', $demandesBourseRussie->id)->first();
        ?>

        <li class="list-group-item">
            <?php if($assocPJdemande == null): ?>
                <?php if(auth()->check() && auth()->user()->hasRole('super-admin')): ?>
                    <div class="d-flex align-items-center ">

                        <i class="fa-solid fa-circle-xmark text-danger" style="font-size:25px; margin-right: 10px"></i>

                        <strong> <?php echo e($pj->nom_pj); ?></strong>

                    </div>
                <?php else: ?>
                    <form method="POST"
                        action="<?php echo e(route('demandes-bourse-russie.update', $demandesBourseRussie->id)); ?>" role="form"
                        enctype="multipart/form-data">
                        <?php echo e(method_field('PATCH')); ?>

                        <?php echo csrf_field(); ?>

                        <input type="text" name="<?php echo e($pj->nom_pj); ?>_id" class="form-control hide"
                            value="<?php echo e($pj->id); ?>" id="">
                        <div class="form-group">
                            <?php echo e(Form::label($pj->description)); ?>

                            <?php echo e(Form::file($pj->nom_pj, ['accept' => 'application/pdf', 'class' => 'form-control form-file-sub is-invalid ', 'placeholder' => 'Nom de la personne à contacter'])); ?>

                            <div class="invalid-feedback">Fichier manquant</div>
                            <?php echo $errors->first($pj->nom_pj, '<div class="invalid-feedback">:message</div>'); ?>


                        </div>

                    </form>
                <?php endif; ?>
            <?php else: ?>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="d-flex ">
                        <i class="fa-solid fa-circle-check text-success" style="font-size:25px; margin-right: 10px"></i>
                        <strong> <?php echo e($pj->nom_pj); ?></strong>
                    </span>
                    <span class="d-flex">

                        <a href="<?php echo e(Storage::url($assocPJdemande->url)); ?>" target="_blank">
                            <button class="btn btn-info text-white btn-sm mx-3" style="pointer-events: none"><i
                                    class="fa fa-fw fa-eye"></i>
                                <strong>Voir</strong></button></a>

                        <?php if(!$assocPJdemande->isConfirmed): ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('super-admin')): ?>
                            <form method="POST"
                            action="<?php echo e(route('demandes-bourse-russie.update', $demandesBourseRussie->id)); ?>" role="form"
                            enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>



                                    <input type="text" class="hide" name="pj_conf_id"
                                        value="<?php echo e($assocPJdemande->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-success text-white btn-sm mx-3 show_confirm" type="submit"><i
                                            class="fa fa-check"></i>
                                        <strong>Confirmer</strong></button>
                                </form>
                            <?php else: ?>
                            <form method="POST"
                            action="<?php echo e(route('demandes-bourse-russie.update', $demandesBourseRussie->id)); ?>" role="form"
                            enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>



                                    <input type="text" class="hide" name="delete_pj"
                                        value="<?php echo e($assocPJdemande->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger text-white btn-sm mx-3 show_confirm2" type="submit"><i
                                            class="fa fa-trash"></i>
                                        <strong>Supprimer</strong></button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>

                    </span>

                </div>
            <?php endif; ?>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        ---
    <?php endif; ?>

</ul>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/demandes-bourse-russie/piece_jointe_form.blade.php ENDPATH**/ ?>