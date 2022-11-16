@php
        $eff_total = count($lot->demandes()->get());
        $v = \App\Models\AssocLotsDemande::count();
        $pourcent_total = ($eff_total * 100) / ($v == 0 ? 1 : $v);
        $pourcent_total = intval($pourcent_total);
        $eff_nontraite = $lot->demandesSansAvis()->count();
        $pourcent_nontraite = ($eff_nontraite * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_nontraite = intval($pourcent_nontraite);
        $eff_traite = $lot->demandesAvecAvis()->count();
        $pourcent_traite = ($eff_traite * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_traite = intval($pourcent_traite);
        $eff_fav = $lot->demandesAvecAvisParticulier('Favorable')->count();
        $pourcent_fav = ($eff_fav * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_fav = intval($pourcent_fav);
        $eff_res = $lot->demandesAvecAvisParticulier('Réservé')->count();
        $pourcent_res = ($eff_res * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_res = intval($pourcent_res);
        $eff_def = $lot->demandesAvecAvisParticulier('Défavorable')->count();
        $pourcent_def = ($eff_def * 100) / ($eff_total == 0 ? 1 : $eff_total);
        $pourcent_def = intval($pourcent_def);

    @endphp
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}

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
    {{-- <center><img width="100%" src="http://beraca-transport.net/EGLISEDEVILLE/v.png" alt=""></center> --}}
    {{-- <center><img width="100%" src="http://127.0.0.1/dbau-barner.png" alt=""></center> --}}

    <table class="w-100">
        <tr>
            <td>
                <h4 class="underline text-up">Lot N° {{ $lot->Numero }}</h4>
            </td>
            <td style="text-align: right">
                <span>Référence PV : <strong>{{ $pv->Reference_PV }}</strong> , du
                    <strong>{{ $pv->DateDebutSession }}</strong> au <strong>{{ $pv->DateFinSession }}</strong></span>

            </td>
        </tr>
    </table>
    <center>
        @php
            $comm=\App\Models\User::find($lot->Commissaire);
        @endphp
        <h4>Commissaire : <strong> {{ $comm->email.' | '.$comm->name }} </strong></h4>
    </center>


        <table class="w-100 table" border="all">
            <tr class="bg-gray-300">
                <th class="p-2">.</th>
                <th class="p-2">Effectif</th>
                <th class="p-2">Pourcentage</th>
            </tr>

            <tbody>

                <tr>
                    <td>Nombre de Demande</td>
                    <td class="text-center p-2">{{ $eff_total }}</td>
                    <td class="text-center">{{ $pourcent_total }} %</td>
                </tr>
                <tr>
                    <td>Demande non traité</td>
                    <td class="text-center p-2">{{ $eff_nontraite }}</td>
                    <td class="text-center">{{ $pourcent_nontraite }} %</td>
                </tr>
                <tr>
                    <td>Demande Traité</td>
                    <td class="text-center p-2">{{ $eff_traite }}</td>
                    <td class="text-center">{{ $pourcent_traite }} %</td>
                </tr>
                <tr>
                    <td>Demande Favorable</td>
                    <td class="text-center p-2">{{ $eff_fav }}</td>
                    <td class="text-center">{{ $pourcent_fav }} %</td>
                </tr>
                <tr>
                    <td>Demande Réservé</td>
                    <td class="text-center p-2">{{ $eff_res }}</td>
                    <td class="text-center">{{ $pourcent_res }} %</td>
                </tr>
                <tr>
                    <td>Demande Défavorable</td>
                    <td class="text-center p-2">{{ $eff_def }}</td>
                    <td class="text-center">{{ $pourcent_def }} %</td>
                </tr>

            </tbody>

        </table>
<p>
    Imprimé par : {{ Auth::user()->name }}
</p>


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
