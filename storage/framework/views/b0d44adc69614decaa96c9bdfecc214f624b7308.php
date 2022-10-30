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
        font-size: 15px;
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

    /* .bg-gray-100{
        background: rgba(128, 128, 128, 0.3)
    } */
</style>

<body class="p-0">
    
    

    <table class="w-100">
        <tr>
            <td>
                <h4 class="underline text-up">Lot N° <?php echo e($lot->Numero); ?></h4>
            </td>
            <td style="text-align: right">
                <span>Référence PV : <strong><?php echo e($pv->Reference_PV); ?></strong> , du
                    <strong><?php echo e($pv->DateDebutSession); ?></strong> au <strong><?php echo e($pv->DateFinSession); ?></strong></span>

            </td>
        </tr>
    </table>
    <center>
        <h4>SESSION DE LA CNABAU DU : <strong> <?php echo e($pv->Reference_PV); ?> </strong></h4>
    </center>
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $grp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h4 class="bg-gray-100 p-2"><?php echo e(str_replace('/', ' / ', $key)); ?></h4>
        <table class="w-100 table" border="all">
            <tr class="bg-gray-300">
                <th rowspan="2">Matricule</th>
                <th rowspan="2">Nom et Prénoms</th>
                <th rowspan="2">DateNaiss</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Référence</th>
                <th rowspan="2">Situation Antérieur</th>
                <th colspan="3"> Avis de la commission
                </th>
            </tr>
            <tr class="bg-gray-300">
                <th>F</th>
                <th>D</th>
                <th>R</th>
            </tr>
            <tbody>
                <?php $__currentLoopData = $grp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($dem->Matricule); ?></td>
                    <td><?php echo e($dem->NomEtudiant . ' ' . $dem->PrenomEtudiant); ?></td>
                    <td class="text-center"><?php echo e($dem->DateNaissanceEtudiant); ?> </td>
                    <td><?php echo e($dem->CodeTypeDemande); ?></td>
                    <td>Page : <br>N°: <br><br></td>
                    <td><?php echo e($dem->Situationanterieure); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan='9' class='text-center'>TOTAL : <?php echo e(count($grp)); ?></td>
                </tr>
            </tbody>

        </table>
        <?php if(!$loop->last): ?>
            <div class="page-break"></div>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <h4></h4>


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
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/upb/pdf_export_lot.blade.php ENDPATH**/ ?>