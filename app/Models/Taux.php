<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taux
 *
 * @property $CodeTaux
 * @property $CodeFiliere
 * @property $CodeAnneeEtude
 * @property $CodeNatureAllocation
 * @property $CodeAnneeAcademique
 * @property $TauxAllocation
 * @property $AccessoireAllocation
 *
 * @property AnneeAcademique $anneeAcademique
 * @property AnneEtude $anneEtude
 * @property Filiere $filiere
 * @property NatureAllocation $natureAllocation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Taux extends Model
{
    protected $table ='taux';
    protected $primaryKey = 'CodeTaux';

    static $rules = [
		
		'CodeFiliere' => 'required',
		'CodeAnneeEtude' => 'required',
		'CodeNatureAllocation' => 'required',
		'CodeAnneeAcademique' => 'required',
		'TauxAllocation' => 'required',
		'AccessoireAllocation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeTaux','CodeFiliere','CodeAnneeEtude','CodeNatureAllocation','CodeAnneeAcademique','TauxAllocation','AccessoireAllocation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function anneeAcademique()
    {
        return $this->hasOne('App\Models\AnneeAcademique', 'CodeAnneeAcademique', 'CodeAnneeAcademique');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function anneEtude()
    {
        return $this->hasOne('App\Models\AnneEtude', 'CodeAnneeEtude', 'CodeAnneeEtude');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filiere()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'CodeFiliere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function natureAllocation()
    {
        return $this->hasOne('App\Models\NatureAllocation', 'CodeNatureAllocation', 'CodeNatureAllocation');
    }


}
