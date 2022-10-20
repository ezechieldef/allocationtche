<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscriptionuniversite2021
 *
 * @property $Matricule
 * @property $NomEtudiant
 * @property $PrenomEtudiant
 * @property $DateNaissanceEtudiant
 * @property $LieuNaissanceEtudiant
 * @property $SexeEtudiant
 * @property $Nationalite
 * @property $AdresseEtudiant
 * @property $Email
 * @property $Telephone1
 * @property $LibelleCourtUniversite
 * @property $CodeEtablissement
 * @property $CodeFiliere
 * @property $CodeAnneeEtude
 * @property $Inscription
 * @property $StatutAllocataire
 * @property $codeEtudiant
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Etudiant extends Model
{
    protected $table = 'etudiant';
    protected $primaryKey = 'CodeEtudiant';


    static $rules = [
        'CodeEtudiant' => 'required',
        'Matricule' => 'required',
        'NomEtudiant' => 'required',
        'PrenomEtudiant' => 'required',
        'DateNaissanceEtudiant' => 'required',
        'LieuNaissanceEtudiant' => 'required',
        'SexeEtudiant' => 'required',
        'Nationalite' => 'required',
        'AdresseEtudiant' => 'required',
        'Email' => 'required',
        'Telephone' => 'required',
        'CodeFiliere' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [

        'CodeEtudiant',
        'Matricule',
        'NomEtudiant',
        'PrenomEtudiant',
        'DateNaissanceEtudiant',
        'LieuNaissanceEtudiant',
        'SexeEtudiant',
        'Nationalite',
        'AdresseEtudiant',
        'Email',
        'Telephone',
        'CodeFiliere',
        'NPI',
        'user_id',
        'url_CIP',
        'url_RIB',
        'url_CIP_valide',
        'url_RIB_valide'
    ];
    public static function rechercher($map)
    {
        $res = Etudiant::where('Matricule', $map['Matricule'])
            ->where('NomEtudiant', $map['NomEtudiant'])
            ->where('PrenomEtudiant', $map['PrenomEtudiant'],)
            ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant'],)
            ->where('CodeFiliere', $map['CodeFiliere']);
        if (!$res->exists()) {
            return null;
        }
        return $res->first();
    }
    public static function getFillableArray(array $tab)
    {
        $t = array();
        $fillable = [
            'CodeEtudiant',
            'Matricule',
            'NomEtudiant',
            'PrenomEtudiant',
            'DateNaissanceEtudiant',
            'LieuNaissanceEtudiant',
            'SexeEtudiant',
            'Nationalite',
            'AdresseEtudiant',
            'Email',
            'Telephone',
            'CodeFiliere',
            'NPI',
            'user_id',
            'url_CIP',
            'url_RIB',
            'url_CIP_valide',
            'url_RIB_valide'
        ];
        foreach ($tab as $key => $value) {
            if (in_array($key, $fillable)) {
                $t[$key] = $value;
            }
        }
        return $t;
    }
}
