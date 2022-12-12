<style>


</style>
<!DOCTYPE html>
<html lang="fr">
<?php

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
</head>

<body style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
<center>

    <img src="https://beraca-transport.net/EGLISEDEVILLE/v.png" alt="">
</center>

    

    
    <style>
        .btn-style {
            background-color: rgba(0, 0, 0, .05);
            /* border: 1px dashed grey; */
            padding: 5px;
        }

        .col-auto {
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
        }

        tr {
            margin: 3px;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <center>
        <h2 style="text-decoration: underline">Direction des Bourses et Aides Universitaire</h2>

        <h3 class="mb-3"> Fiche d'inscription : Bourse de Coopération Russe </h4>
    </center>


    <table style="width: 100%" border="1px dashed grey">
        <tr>
            <td>
                <strong>Code Demande</strong>
                <div class="btn-style">
                    <div class='btn-style'><?php echo e($demandesBourseRussie->code); ?></div>
                </div>
            </td>
            <td colspan="2">
                <strong>Nom</strong>
                <div class="btn-style">
                    <div class='btn-style'><?php echo e($demandesBourseRussie->nom); ?></div>
                </div>
            </td>
            <td colspan="3">
                <strong>Prénoms</strong>
                <div class="btn-style">
                    <div class='btn-style'><?php echo e($demandesBourseRussie->prenoms); ?></div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Date Naissance:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->date_naissance); ?></div>
            </td>

            <td>
                <strong>Sexe:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->sexe); ?></div>
            </td>

            <td colspan="3">
                <strong>Lieu Naissance:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->lieu_naissance); ?></div>
            </td>



        </tr>
        <tr>
            <td colspan="3">
                <strong>Diplome de base:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->diplome_de_base .' | '.$demandesBourseRussie->serie_ou_filiere); ?></div>
            </td>
            <td colspan="3">
                <strong>Diplome de base (Année | Moy | Mention ) :</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->annee_obtention_bac.' | '.$demandesBourseRussie->moyenne_bac.' | '.$demandesBourseRussie->mention); ?></div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>Niveau & Filière sollicité:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->niveau_sollicite .' | '.$demandesBourseRussie->filiere_choisi); ?></div>
            </td>


        </tr>
        <tr>
            <td> <strong>Status Bourse:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->status_bourse); ?></div>
            </td>
            <td colspan="3"><strong>Contact Whatsapp:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->contact_whatsapp); ?></div>
            </td>
            <td colspan="2"><strong>Contact Parent:</strong>
                <div class='btn-style'><?php echo e($demandesBourseRussie->contact_parent); ?></div>
            </td>
        </tr>
        <tr>
            <td colspan="6">

                <?php $__empty_1 = true; $__currentLoopData = App\Models\PieceJointeChine::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <?php
                        $assocPJdemande = $demandesBourseRussie->pjID($pj->id)->first() ?? null;
                        // $lien_doc = $assocPJdemande == null ? null : $assocPJdemande->where('user_id', $demandesBourseRussie->id)->first();
                    ?>


                        <?php if($assocPJdemande == null): ?>

                            <div class="form-group">
                                <div class="d-flex align-items-middle">

                                    <i class="fa fa-fw fa-close"
                                        style="color: red; font-size:20px; margin-right: 10px"></i>

                                    <?php echo e(Form::label( $pj->nom_pj)); ?>


                                </div>
                            </div>
                        <?php else: ?>

                            <div class="form-group">
                                <div class="d-flex align-items-middle">


                                    <i class="fa fa-fw fa-check"
                                        style="color: green; font-size:20px; margin-right: 10px"></i>

                                    <?php echo e(Form::label($pj->nom_pj)); ?>


                                </div>
                            </div>
                        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>

                    
            </td>

        </tr>
    </table>
    <div style="text-align: end ; margin-top:15px; width: 100%; float:right;">
        <label for=""> <strong>Demande émise le : </strong> <br>
            <?php echo e(\Carbon\Carbon::parse($demandesBourseRussie->created_at)->translatedFormat('d F Y à H\hi')); ?></label>
        <br>
        <label for=""> <strong> Imprimée le :</strong> <br>
            <?php echo e(\Carbon\Carbon::parse(date('d-m-Y'))->translatedFormat('d F Y ')); ?>


    </div>



</body>

</html>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/demandes-bourse-russie/pdf.blade.php ENDPATH**/ ?>