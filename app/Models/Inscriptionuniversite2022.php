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
class Inscriptionuniversite2022 extends Model
{
    protected $table ='inscriptionuniversite2022';
    protected $primaryKey = 'CodeEtudiant';
    public $incrementing = false;
    protected $keyType = 'string';
    static $rules = [
		'Matricule' => 'required',
		'NomEtudiant' => 'required',
		'PrenomEtudiant' => 'required',
		'DateNaissanceEtudiant' => 'required',
		'LieuNaissanceEtudiant' => 'required',
		'SexeEtudiant' => 'required',
		'Nationalite' => 'required',
		'AdresseEtudiant' => 'required',
		'Email' => 'required',
		'Telephone1' => 'required',
		'LibelleCourtUniversite' => 'required',
		'CodeEtablissement' => 'required',
		'CodeFiliere' => 'required',
		'CodeAnneeEtude' => 'required',
		'Inscription' => 'required',
		'StatutAllocataire' => 'required',
		'CodeEtudiant' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Matricule',
    'NomEtudiant',
    'PrenomEtudiant',
    'DateNaissanceEtudiant','LieuNaissanceEtudiant','SexeEtudiant','Nationalite','AdresseEtudiant','Email','Telephone1','LibelleCourtUniversite','CodeEtablissement','CodeFiliere','CodeAnneeEtude','Inscription','StatutAllocataire','codeEtudiant'];



}
