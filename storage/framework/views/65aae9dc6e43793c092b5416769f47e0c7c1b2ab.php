<?php $__env->startSection('titre'); ?>
    Mes Demandes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- The Modal -->
    <div class="modal fade" id="modalPayer">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Paiement</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">


                    <button class="btn btn-outline-success  text-bold w-100 mb-4 py-3" onclick="payer(this)" id="btn-payer">
                        Payer les frais d'étude de ma demande
                    </button>

                    <div class="btn btn-outline-danger text-center w-100 shadow  my-1 py-3" onclick="ancienPaiement(this)"
                        style=" " id="btn-payer-probleme">
                        <h4>Problème avec Paiement</h4>
                        <p>Votre paiement antérieur n'a pas été prise en compte ? <br> <strong> SI OUI CLICQUEZ ICI
                            </strong> </p>
                    </div>



                </div>

            </div>
        </div>
    </div>



    <div class="card border-success">
        <div class="card-header bg-success text-white text-bold">
            Mes demandes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    $apayer = false;
                    foreach ($demandes as $dem) {
                        if ($dem->idtransaction == '' && !is_null($dem->CodeTypeDemande)) {
                            $apayer = true;
                            //dd($dem);
                            break;
                        }
                    }
                ?>

                <?php if($apayer == true): ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Vous avez des paiements en attente </h4>

                        <p class="mb-0">Procédez maintenant au paiement en cliquant sur le bouton <strong>Payer</strong>,
                            sans cela, votre
                            demande ne sera pas prise en compte. Vous pourez ensuite télécharger votre fiche d'inscription</p>
                    </div>


                    
                <?php endif; ?>


                <table class="table  table-bordered w-100 " id="mytable">
                    <thead>
                        <th>Matricule</th>
                        <th>Filière</th>
                        <th>Année Etude</th>
                        <th>Année Académique</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd dt-hasChild parent text-center">
                                <td class=""><?php echo e($dem->Matricule); ?></td>
                                <td class="text-info"><?php echo e($dem->CodeFiliere); ?></td>
                                <td><?php echo e($dem->CodeAnneeEtude); ?></td>
                                <td><?php echo e($dem->CodeAnneeAcademique ?? $dem->Annee); ?></td>
                                <td><?php echo e($dem->CodeTypeDemande ?? '( Ancienne demande )'); ?></td>
                                <?php
                                    $assoc = \App\Models\AssocPvDemande::where('CodeDemandeAllocation', $dem->CodeDemandeAllocation)
                                        ->get()
                                        ->last();
                                ?>
                                <td class="text-dark text-bold">
                                    <?php echo e(is_null($dem->CodeTypeDemande) ? 'TRAITÉ' : (is_null($assoc) ? 'EN COURS DE TRAITEMENT' : $assoc->Avis)); ?>

                                </td>
                                <td class="">
                                    <a href="/voir-demande/<?php echo e($dem->CodeDemandeAllocation); ?>"
                                        class="btn btn-sm btn-info text-white text-bold my-1"> <i
                                            class="fa fa-eye mx-2"></i> Voir
                                    </a>
                                    <?php if(is_null($assoc) &&
                                        !\App\Models\AssocLotsDemande::where('CodeDemandeAllocation', $dem->CodeDemandeAllocation)->exists() &&
                                        !is_null($dem->CodeTypeDemande)): ?>
                                        <a href="/modifier-demande/<?php echo e($dem->CodeDemandeAllocation); ?>"
                                            class="btn btn-sm btn-secondary text-white text-bold my-1"> <i
                                                class="fa fa-edit mx-2"></i>
                                            Modifier </a>
                                    <?php endif; ?>
                                    <?php if($dem->CodeTypeDemande != '' && $dem->idtransaction != ''): ?>
                                        <a href="/imprimer-fiche/<?php echo e($dem->CodeDemandeAllocation); ?>"
                                            class="btn btn-sm btn-success text-white text-bold my-1"> <i
                                                class="fa fa-print me-2"></i>
                                            Imprimer </a>
                                    <?php endif; ?>

                                    <?php if($dem->CodeTypeDemande != '' &&
                                        $dem->idtransaction == '' &&
                                        \App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique ?? $dem->Annee)->taux != 0): ?>
                                        <button code="<?php echo e($dem->CodeDemandeAllocation); ?>" onclick="loadmodal(this);"
                                            data-bs-toggle="modal" data-bs-target="#modalPayer"
                                            title="Payer les frais d'études de ma demande"
                                            montant="<?php echo e(\App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique ?? $dem->Annee)->taux); ?>"
                                            class="btn btn-sm btn-warning text-dark text-bold my-1"> <i
                                                class="fa fa-credit-card me-2"></i>
                                            Payer </button>
                                            
                                    <?php endif; ?>


                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php if(!is_null($etudiant)): ?>
        <div class="card border-success">


            <div class="card-header bg-success text-white text-bold">
                Pièce à joindre
            </div>
            <div class="card-body">
                <?php if($etudiant->url_RIB == '' || $etudiant->url_CIP == ''): ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Information </h4>

                        <p class="mb-0">Veuillez joindre les pièces listé ci-dessous en PDF pour faciliter leur
                            vérification </p>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('joindre-fichier', $etudiant->CodeEtudiant)); ?>" role="form"
                    enctype="multipart/form-data">
                    <?php echo e(method_field('PATCH')); ?>

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php
                            $tab = [['name' => 'url_RIB', 'label' => 'Relevé d\'Identité Bancaire (RIB)'], ['name' => 'url_CIP', 'label' => 'Certificat d\'Identification Personnel (CIP) ou autres pièce sur laquelle apparaît votre NPI']];
                        ?>

                        <?php $__currentLoopData = $tab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 mt-3 mb-3">

                                <?php if($etudiant[$el['name']] != ''): ?>
                                    <div class="form-group">
                                        <div class="d-flex align-items-middle">
                                            <i class="fa fa-fw fa-check"
                                                style="color: green; font-size:20px; margin-right: 10px"></i>

                                            <?php echo e(Form::label($el['label'])); ?>


                                        </div>
                                        <div class="d-flex">

                                            <a href="<?php echo e(Storage::url($etudiant[$el['name']])); ?>" target="_blank">
                                                <button class="btn btn-info text-white" style="pointer-events: none"><i
                                                        class="fa fa-fw fa-eye"></i>
                                                    <strong>Voir</strong></button></a>
                                            <form method="POST"
                                                action="<?php echo e(route('joindre-fichier', $etudiant->CodeEtudiant)); ?>">
                                                <?php echo e(method_field('PATCH')); ?>

                                                <?php echo csrf_field(); ?>
                                                <input type="text" name="delete" value="oui" class="hide">
                                                <input type="text" name="delete_val" value="<?php echo e($el['name']); ?>"
                                                    class="hide">
                                                <button class="btn btn-danger mx-3 text-white" type="submit"><i
                                                        class="fa fa-fw fa-trash"></i><strong>Supprimer</strong>
                                                </button>
                                            </form>
                                        </div>
                                        <?php echo $errors->first($el['name'], '<div class="alert alert-danger mt-2">:message</div>'); ?>

                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?php echo e(Form::label($el['label'])); ?>

                                        <?php echo e(Form::file($el['name'], ['accept' => 'application/pdf', 'class' => 'form-control form-file is-invalid' . ($errors->has('url_diplome_ou_bac') ? ' is-invalid' : ''), 'placeholder' => ''])); ?>

                                        <div class="invalid-feedback">Choisissez le fichier (Taille Maximal : 2 Mo)
                                        </div>
                                        <?php echo $errors->first($el['name'], '<div class="alert alert-danger mt-2">:message</div>'); ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>

                </form>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<script>
    function ancienPaiement(btn) {
        var code = btn.getAttribute('code');
        var montant = btn.getAttribute('montant');
        Swal.fire({
            title: 'Entrer l\'ID de la transaction contenu dans le message de paiement',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Soumettre',
            cancelButtonText: 'Annuler',
            confirmButtonColor: '#39cb7f',
            showLoaderOnConfirm: true,
            preConfirm: (saisi) => {
                location.href = '/apres-paiement/' + code + '/' + saisi;
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {

        })
    }

    function loadmodal(btn) {
        var btnp = document.getElementById('btn-payer');
        var btnprobleme = document.getElementById('btn-payer-probleme');
        btnp.setAttribute('montant', btn.getAttribute('montant'));
        btnp.setAttribute('code', btn.getAttribute('code'));

        btnprobleme.setAttribute('montant', btn.getAttribute('montant'));
        btnprobleme.setAttribute('code', btn.getAttribute('code'));
    }

//     function paiementplustard() {
// //         swal("Paiement non disponible temporairement. Veillez patienter, puis réessayer dans une semaine ", {
// //   buttons: [true],
// // });
// // swal({
// // 	title: "Good job!",
// // 	text: "You clicked the button!",
// // 	icon: "success",
// // 	button: "Aww yiss!"
// // });
// alert("Paiement non disponible temporairement. Veillez patienter, puis réessayer dans une semaine ");
//     }

    function payer(btn) {

        var code = btn.getAttribute('code');
        var montant = btn.getAttribute('montant');
        // alert(<?php echo e(env('KKIA_SANBOX') ? 'true' : 'false'); ?>);
        openKkiapayWidget({
            amount: montant,
            position: "center",
            sandbox: <?php echo e(env('KKIA_SANBOX') ? 'true' : 'false'); ?>,
            callback: "<?php echo e(env('APP_URL')); ?>/apres-paiement/" + code + '/',
            data: code,
            theme: "green",
            key: "<?php echo e(env('KKIA_PUBLIC_API_KEY')); ?>"
        });

        addSuccessListener(response => {
            location.href = '/apres-paiement/' + code + '/' + response['transactionId'];
        });
    }
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/mes_demandes.blade.php ENDPATH**/ ?>