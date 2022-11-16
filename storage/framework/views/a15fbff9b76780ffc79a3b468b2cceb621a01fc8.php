<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https//fonts.googleapis.com/css?family=Source Sans Pro">
    
    
    
</head>
<style>
    body{
        font-family: 'Source Sans Pro';
        font-size: 13px;
    }
    .text-underline {
        text-decoration: underline;
    }

    .bg-gray {
        background: rgba(128, 128, 128, 0.5);
    }

    .border-white {
        border: 5px solid white;
    }

    .text-italic {
        font-style: italic;
    }

    .tw-600 {
        font-weight: 600
    }

    .borderd {
        border: 2px solid rgba(128, 128, 128, 0.3);
        border-radius: 3px;
    }

    .bg-gray-100 {
        background: rgba(128, 128, 128, 0.1)
    }

    .border-none {
        border: none;
    }

    .title {
        font-weight: 600
    }

    table tr td {

        padding: 0px 8px 0px 8px;
        border: 2px solid rgba(128, 128, 128, 0.5);
        border-radius: 3px;

    }

    table {
        border-spacing: 7px;

    }
    .w-100{
        width: 100%;
    }
    .card-header{
        padding: 20px;
        margin: 10px;
        text-align: center
    }
    .ki{
        padding: 15px 0px 15px 0px;
        text-align: center;
    }
    .shadow-lg{
        box-shadow: 0px 0px 10px grey;
    }
    .text-center{
        text-align: center;
    }
    .text-up{
        text-transform: uppercase;
    }
    .my-3{
        padding: 15px 0px 15px 0px;
    }
    .py-4{
        padding: 20px 0px 20px 0px;
    }
</style>

<body class="p-0">
    
    <center><img width="100%" src="http://127.0.0.1/dbau-barner.png" alt=""></center>

    <div class="text-center text-underline my-3 text-up">
        <h3>Direction des Bourses et Aides Universitaire</h3>
    </div>
    <div class="text-center py-3">
        <label>
            <h4 class="p4 bg-gray px-4 py-3 shadow-lg border-white ki">FICHE DE DEMANDE EN LIGNE D'ALLOCATION UNIVERSITAIRE
            </h4>
        </label>
    </div>


    <div class="container-fluid py-4">
        <div class="card border p-3">
            <div class="card-header text-center text-italic tw-600 border bg-gray-100 p-3">
                INFORMATION SUR L'IDENTITÉ DE L'ÉTUDIANT(E) ALLOCATAIRE
            </div>

            <table class=" table-responsive w-100 ">
                <thead>
                    <?php for($i = 0; $i < 12; $i++): ?>
                        <th class="border-none"></th>
                    <?php endfor; ?>
                </thead>

                <tr class="p-2">
                    <td colspan="12">

                        <p class="m-0"><span class="title">Code Demande : </span><span
                                class="text-italic"><?php echo e($dem->CodeDemandeAllocation.'-'. $dem->idtransaction.'-'. $dem->CodeAnneeAcademique); ?></span></p>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                        <p class="m-0 d-flex"> <span class="title">Matricule : </span> <span
                                class="text-italic"><?php echo e($dem->Matricule); ?></span></p>

                    </td>
                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">Nom : </span> <span
                                class="text-italic"><?php echo e($dem->NomEtudiant); ?></span></p>

                    </td>
                    <td colspan="6">

                        <p class="m-0 d-flex"> <span class="title">Prénoms : </span> <span
                                class="text-italic"><?php echo e($dem->PrenomEtudiant); ?></span></p>

                    </td>
                </tr>
                <tr>
                    <td>

                        <p class="m-0"> <span class="title">Sexe : </span> <span
                                class="text-italic"><?php echo e($dem->SexeEtudiant); ?></span></p>

                    </td>
                    <td colspan="3">

                        <p class="m-0 d-flex"> <span class="title">Date de naissance : </span> <span
                                class="text-italic"><?php echo e($dem->DateNaissanceEtudiant); ?></span></p>

                    </td>
                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">Lieu de naissance : </span> <span
                                class="text-italic"><?php echo e($dem->LieuNaissanceEtudiant); ?></span></p>

                    </td>
                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">Nationalité : </span> <span
                                class="text-italic"><?php echo e($dem->Nationalite); ?></span></p>

                    </td>

                </tr>
                <tr>
                    <td colspan="2">

                        <p class="m-0 d-flex"> <span class="title">Université : </span> <span
                                class="text-italic"><?php echo e(\App\Models\Filiere::find($dem->CodeFiliere)->etablissement()->first()->universite()->first()->CodeUniversite); ?></span>
                        </p>

                    </td>
                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">École / Faculté : </span> <span
                                class="text-italic"><?php echo e(\App\Models\Filiere::find($dem->CodeFiliere)->etablissement()->first()->CodeEtablissement); ?></span>
                        </p>

                    </td>
                    <td colspan="6">

                        <p class="m-0 d-flex"> <span class="title">Filière : </span> <span
                                class="text-italic"><?php echo e(\App\Models\Filiere::find($dem->CodeFiliere)->LibelleFiliere); ?></span>
                        </p>

                    </td>
                </tr>
                <tr>
                    <td>

                        <p class="m-0"> <span class="title">Année d'Étude : </span> <span
                                class="text-italic"><?php echo e($dem->CodeAnneeEtude); ?></span></p>

                    </td>
                    <td colspan="7">

                        <p class="m-0 d-flex"> <span class="title">Email : </span> <span
                                class="text-italic"><?php echo e($dem->Email); ?></span></p>

                    </td>

                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">Téléphone : </span> <span
                                class="text-italic"><?php echo e($dem->Telephone); ?></span></p>

                    </td>

                </tr>
            </table>
            <div class="card-header text-center text-italic tw-600 border bg-gray-100 p-3 mt-5 mb-3">
                INFORMATION SUR LA DEMANDE D'ALLOCATION
            </div>
            <table class=" w-100 ">
                <thead>
                    <?php for($i = 0; $i < 12; $i++): ?>
                        <th class="border-none"></th>
                    <?php endfor; ?>
                </thead>


                <tr>
                    <td colspan="2" class="">

                        <p class="m-0 d-flex"> <span class="title">Année Académique : </span> <span
                                class="text-italic"><?php echo e(\App\Models\AnneeAcademique::find($dem->CodeAnneeAcademique)->LibelleAnneeAcademique); ?></span>
                        </p>

                    </td>
                    <td colspan="4" class="">

                        <p class="m-0 d-flex"> <span class="title">Type d'Allocation : </span> <span
                                class="text-italic"><?php echo e($dem->CodeTypeDemande); ?></span></p>

                    </td>
                    <td colspan="6">

                        <p class="m-0 d-flex"> <span class="title">Nature d'Allocation : </span> <span
                                class="text-italic"><?php echo e($dem->CodeNatureAllocation); ?></span></p>

                    </td>
                </tr>
                <tr>
                    <td>

                        <p class="m-0"> <span class="title">Banque : </span> <span
                                class="text-italic"><?php echo e($dem->CodeBanque); ?></span></p>

                    </td>
                    <td colspan="7">

                        <p class="m-0 d-flex"> <span class="title">RIB : </span> <span
                                class="text-italic"><?php echo e($dem->RIB); ?></span></p>

                    </td>
                    <td colspan="4">

                        <p class="m-0 d-flex"> <span class="title">Date de demande : </span> <span
                                class="text-italic text-center"><?php echo e($dem->created_at); ?></span></p>

                    </td>

                </tr>

            </table>
        </div>

    </div>
    <div class="py-4" style="text-align: end">
        <label for="">Imprimé le : <?php echo e(date('d/m/Y à H:i:s')); ?></label>
    </div>


</body>

</html>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/pdf_demande.blade.php ENDPATH**/ ?>