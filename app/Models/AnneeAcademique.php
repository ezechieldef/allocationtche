<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $CodeAnneeAcademique
 * @property string  $CodeAnneeAcademique
 * @property string  $libele
 * @property string  $libele
 * @property string  $LibelleAnneeAcademique
 * @property string  $DebutEcheance
 * @property string  $FinEcheance
 * @property string  $StatutAnneeAcademique
 * @property string  $LibelleAnneeAcademique
 * @property string  $DebutEcheance
 * @property string  $FinEcheance
 * @property string  $StatutAnneeAcademique
 * @property int     $code
 * @property int     $created_at
 * @property int     $updated_at
 * @property int     $code
 * @property int     $created_at
 * @property int     $updated_at
 * @property boolean $actif
 * @property boolean $actif
 */
class AnneeAcademique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'annee_academique';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CodeAnneeAcademique';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CodeAnneeAcademique', 'CodeAnneeAcademique', 'libele', 'code', 'actif', 'created_at', 'updated_at', 'libele', 'code', 'actif', 'created_at', 'updated_at', 'LibelleAnneeAcademique', 'DebutEcheance', 'FinEcheance', 'StatutAnneeAcademique', 'LibelleAnneeAcademique', 'DebutEcheance', 'FinEcheance', 'StatutAnneeAcademique'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'CodeAnneeAcademique' => 'string',
        'CodeAnneeAcademique' => 'string',
        'libele' => 'string',
        'code' => 'int',
        'actif' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'libele' => 'string',
        'code' => 'int',
        'actif' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'LibelleAnneeAcademique' => 'string',
        'DebutEcheance' => 'string',
        'FinEcheance' => 'string',
        'StatutAnneeAcademique' => 'string',
        'LibelleAnneeAcademique' => 'string',
        'DebutEcheance' => 'string',
        'FinEcheance' => 'string', 'StatutAnneeAcademique' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
