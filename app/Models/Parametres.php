<?php

namespace App\Models;

class Parametres
{
    // 'api'=>'https://beraca-transport.net/envoi_note/c.php?matricule={Matricule}&annee_academique={AnneeAcademique}'
    const UNIVERSITE = [
        'UAC2022' => ['apiperso' => 'https://beraca-transport.net/envoi_note/c.php?matricule={Matricule}&annee_academique={AnneeAcademique}', 'api' => 'https://scolarite.uac.bj:9443/Higher_Education_UAC/api/inscriptions/{Matricule}/{AnneeAcademique}', 'token' => ''],
        'UAC2021' => ['apiperso' => 'https://beraca-transport.net/envoi_note/c.php?matricule={Matricule}&annee_academique={AnneeAcademique}', 'api' => 'https://scolarite.uac.bj:9443/Higher_Education_UAC/api/inscriptions/{Matricule}/{AnneeAcademique}', 'token' => ''],
        'UAC2020' => ['apiperso' => 'https://beraca-transport.net/envoi_note/c.php?matricule={Matricule}&annee_academique={AnneeAcademique}', 'api' => 'https://scolarite.uac.bj:9443/Higher_Education_UAC/api/inscriptions/{Matricule}/{AnneeAcademique}', 'token' => ''],

        'UNA2022' => ['api' => 'https://inscription.una.bj/apigouv/?matricule={Matricule}&token=7WK5T79u5mIzjIXXi2ohdw632ghgd622redgdj&host=dbsu', 'token' => ''],
        'UNA2021' => ['api' => 'https://inscription.una.bj/apigouv/?matricule={Matricule}&token=7WK5T79u5mIzjIXXi2ohdw632ghgd622redgdj&host=dbsu', 'token' => ''],
        'UNA2020' => ['api' => '', 'token' => '', 'table'=>'archive_inscriptionuniversite'],
        // 'UNA' => ['api' => 'https://inscription.una.bj/apigouv/?matricule={Matricule}&token=7WK5T79u5mIzjIXXi2ohdw632ghgd622redgdj&statut=BRS&host=dbsu', 'token' => ''],
        'UNSTIM2022' => ['api' => 'https://scolarite.unstim.bj/api/student-info/{Matricule}', 'token' => '2e1fdfcfea9864ccb4444e0e01c602ff66107a7181fb5636b3f0371c1e4a2823'],
        'UNSTIM2021' => ['api' => 'https://scolarite.unstim.bj/api/student-info/{Matricule}', 'token' => '2e1fdfcfea9864ccb4444e0e01c602ff66107a7181fb5636b3f0371c1e4a2823'],
        'UNSTIM2020' => ['api' => 'https://scolarite.unstim.bj/api/student-info/{Matricule}', 'token' => '2e1fdfcfea9864ccb4444e0e01c602ff66107a7181fb5636b3f0371c1e4a2823'],

        'UP' => ['api' => null, 'table' => 'api_local_table_up']
    ];
}