<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


/**
 * Class ArchiveAllocataire
 *
 * @property mixed $Matricule,
 * @property mixed $NomEtudiant',
 * @property mixed $PrenomEtudiant',
 * @property mixed $DateNaissanceEtudiant',
 * @property mixed $LieuNaissanceEtudiant',
 * @property mixed $SexeEtudiant',
 * @property mixed $Nationalite',
 * @property mixed $AdresseEtudiant',
 * @property mixed $Email',
 * @property mixed $Telephone1',
 * @property mixed $LibelleCourtUniversite',
 * @property mixed $CodeEtablissement',
 * @property mixed $CodeFiliere',
 * @property mixed $CodeAnneeEtude',
 * @property mixed $StatutAllocataire',
 * @property mixed $RIB',
 * @property mixed $CodeBanque',
 * @property mixed $Anneedebutformation',
 * @property mixed $codeEtudiant',
 * @property mixed $Annee'
 * @property ArchiveAllocataire $rechercher
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
*/

class ArchiveAllocataire extends Model
{

    protected $table="archive_allocataires";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Matricule',
        'NomEtudiant',
        'PrenomEtudiant',
        'DateNaissanceEtudiant',
        'LieuNaissanceEtudiant',
        'SexeEtudiant',
        'Nationalite',
        'AdresseEtudiant',
        'Email',
        'Telephone1',
        'LibelleCourtUniversite',
        'CodeEtablissement',
        'CodeFiliere',
        'CodeAnneeEtude',
        'StatutAllocataire',
        'RIB',
        'CodeBanque',
        'Anneedebutformation',
        'codeEtudiant',
        'Annee'
    ];

    public static function rechercher(int $anne_academique , array $map)
    {
        $r = ArchiveAllocataire::where('Annee',$anne_academique)
        // ->where('CodeAnneeEtude', $annee_etude)
        ->where('NomEtudiant', $map['NomEtudiant'])
        ->where('PrenomEtudiant', $map['PrenomEtudiant'])
        ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant']);

        if (!$r->exists()) {
            return null;
        }
        return $r->first();
    }


}
