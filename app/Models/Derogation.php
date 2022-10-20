<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Derogation
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
 * @property $created_at
 * @property $updated_at
 * @property $user_id
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Derogation extends Model
{
    protected $table = 'derogation';
    static $rules = [
        'Matricule' => 'required',
        'NomEtudiant' => 'required',
        'PrenomEtudiant' => 'required',
        'DateNaissanceEtudiant' => 'required',
        'LieuNaissanceEtudiant' => 'required',
        'SexeEtudiant' => 'required|in:F,M',
        'Nationalite' => 'required',
        // 'AdresseEtudiant' => 'required',
        // 'Email' => 'required',
        // 'Telephone1' => 'required',
        'CodeUniversite' => 'required',
        'CodeEtablissement' => 'required',
        'CodeFiliere' => 'required',
        'CodeAnneeEtude' => 'required',
        // 'Inscription' => 'required',
        'StatutAllocataire' => 'required',
        // 'codeEtudiant' => 'required',
        // 'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Matricule',
    'NomEtudiant', 'PrenomEtudiant',
    'DateNaissanceEtudiant', 'LieuNaissanceEtudiant',
     'SexeEtudiant', 'Nationalite',
      'CodeUniversite', 'CodeEtablissement', 'CodeFiliere',
       'CodeAnneeEtude',  'StatutAllocataire', ];

    public static function rechercher(int $anne_academique, array $map)
    {
        $res = Derogation::where('NomEtudiant', $map['NomEtudiant'])
            ->where('PrenomEtudiant', $map['PrenomEtudiant'])
            ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant'])
            ->where('CodeAnneeEtude', $map['CodeAnneeEtude'])
            ->where('SexeEtudiant', $map['SexeEtudiant']);

        if (!$res->exists()) {
            return null;
        }
        return $res->first();
    }
}
