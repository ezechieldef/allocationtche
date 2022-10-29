<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    
    

</head>
<style>
    body {
        font-family: 'Source Sans Pro';
        font-size: 17px;
    }

    .title {
        font-weight: 600;
    }

    .p-4 {
        padding: 1.5rem !important;
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

    .border-se {
        border: 2px solid rgba(128, 128, 128, 0.3);
        border-radius: 3px;
    }

    .bg-gray-100 {
        background: rgba(128, 128, 128, 0.1)
    }

    .bg-gray-200 {
        background: rgba(128, 128, 128, 0.2)
    }

    .bg-gray-300 {
        background: rgba(128, 128, 128, 0.3)
    }

    .bg-gray-400 {
        background: rgba(128, 128, 128, 0.4)
    }

    .border-none {
        border: none;
    }

    .title {
        font-weight: 600
    }

    /* table tr td {

        padding: 0px 8px 0px 8px;
        border: 2px solid rgba(128, 128, 128, 0.5);
        border-radius: 3px;

    } */


    .w-100 {
        width: 100%;
    }

    .h-100 {
        height: 100%;
    }

    .card-header {
        padding: 20px;
        margin: 10px;
        text-align: center
    }

    .ki {
        padding: 15px 0px 15px 0px;
        text-align: center;
    }

    .shadow-lg {
        box-shadow: 0px 0px 10px grey;
    }

    .text-center {
        text-align: center;
    }

    .text-up {
        text-transform: uppercase;
    }

    .my-3 {
        padding: 15px 0px 15px 0px;
    }

    .py-4 {
        padding: 20px 0px 20px 0px;
    }

    td {
        padding: 5px 5px 5px 5px;
    }

    table {
        border-collapse: collapse;
    }

    .p-0 {
        padding: 0;
    }

    .p-2 {
        padding: .5rem;
    }

    .text-white {
        color: white;
    }

    .underline {
        text-decoration: underline;
    }

    .d-flex {
        /* display: flex; */
        display: inline-flex;
        align-items: center;
    }

    .justify-content-between {
        justify-content: space-between
    }

    .page-break {
        page-break-after: always;
    }

    .text-end {
        text-align: right;
    }

    .m-5 {
        margin: 3rem !important;
    }

    .m-4 {
        margin: 1.5rem !important;
    }

    .m-3 {
        margin: 1rem !important;
    }

    .m-2 {
        margin: 0.5rem !important;
    }

    /* .bg-gray-100{
        background: rgba(128, 128, 128, 0.3)
    } */
</style>

<body class="p-0">
    
    
    
    <div class="title text-center bg-gray-200 p-4 border-se ">
        LISTE DES BENEFICIARE D'ALLOCATION D'ÉTUDES UNIVERSITAIRES
    </div>
    <div class="text-end m-3">
        <span>Référence PV : <strong><?php echo e($pv->Reference_PV); ?></strong> , du
            <strong><?php echo e($pv->DateDebutSession); ?></strong> au <strong><?php echo e($pv->DateFinSession); ?></strong></span>
    </div>


    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $grp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label for="">
            Année Académique :
            <strong><?php echo e(\App\Models\AnneeAcademique::find($grp[0]->CodeAnneeAcademique)->LibelleAnneeAcademique); ?></strong>
        </label>

        <center class="text-up"> <h3 class="underline" style=""> <?php echo e(\App\Models\Filiere::find($grp[0]->CodeFiliere)->etablissement()->first()->universite()->first()->LibelleLongUniversite); ?></h3></center>

        <h4 class="bg-gray-100 p-2"><?php echo e(str_replace('/', ' / ', $key)); ?></h4>
        <table class="w-100 table" border="all">
            <thead class="bg-gray-300">
                <th>Matricule</th>
                <th>Nom </th>
                <th>Prénoms </th>
                <th>DateNaiss</th>
                <th>RIB</th>
                <th>Banque</th>
                <th>Taux Mensuel</th>

            </thead>
            <tbody>
                <?php $__currentLoopData = $grp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="text-center"><?php echo e($dem->Matricule); ?></td>
                    <td><?php echo e($dem->NomEtudiant); ?></td>
                    <td><?php echo e($dem->PrenomEtudiant); ?></td>
                    <td class="text-center"><?php echo e($dem->DateNaissanceEtudiant); ?> </td>
                    <td class="text-center"><?php echo e($dem->RIB); ?></td>
                    <td class="text-center"><?php echo e($dem->CodeBanque); ?></td>

                    <td class="text-center"></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan='7' class='text-center'>TOTAL : <?php echo e(count($grp)); ?></td>
                </tr>
            </tbody>

        </table>
        <?php if(!$loop->last): ?>
            <div class="page-break"></div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <center> <h5>Pour la Ministre de l'Enseignement Supérieur et de la Recherche Scientifique et P.D</h5> </center>
    <table class="w-100">
        <tr>
            <td> Le président de la commission Nationale des Bourses et Aides Universitaires. <br><br><br><br><br><br>
            <strong><?php echo e(\App\Models\ReglageDeBase::first()->president_CNABAU); ?></strong>
            </td>
            <td>Le Directeur des Bourses et Aides Universitaires PI<br><br><br><br><br><br>
                <strong><?php echo e(\App\Models\ReglageDeBase::first()->DBAU); ?></strong>
            </td>
        </tr>
    </table>


    <script type="text/php">
        if (isset($pdf)) {
            $x = 730;
            $y = 550;
            $text = "Page {PAGE_NUM} sur {PAGE_COUNT}";

            $font = null;
            $size = 11;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            $pdf->page_text(30, $y, "Imprimé le ".date('d/m/Y à H:i:s') , $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>

</html>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/pdf_export_liste_definitive.blade.php ENDPATH**/ ?>