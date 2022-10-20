<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class DemandeTemp extends Model
{

    protected $table = "dem_temporaire";


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
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
        'CodeUniversite',
        'CodeEtablissement',
        'CodeFiliere',
        'CodeNatureAllocation',
        'CodeAnneeEtude',
        'CodeAnneeAcademique',
        'CodeTypeDemande',
        'CodeNatureAllocation',
        'user_id',
    ];



    /**
     * Get the user associated with the DemandeAllocationUPB
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class, 'CodeEtudiant', 'CodeEtudiant');
    }

    public static function rechercher(int $anne_academique, array $map)
    {
        $res = DemandeTemp::where('CodeAnneeAcademique', $anne_academique)
            ->where('NomEtudiant', $map['NomEtudiant'])
            ->where('PrenomEtudiant', $map['PrenomEtudiant'])
            ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant']);
        if (!$res->exists()) {
            return null;
        }
        return $res->first();
    }
}
