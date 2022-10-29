<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pv
 *
 * @property $CodePV
 * @property $Reference_PV
 * @property $DateDebutSession
 * @property $Session
 * @property $DateFinSession
 * @property $AnneeCivile
 * @property $NoteBasPage
 * @property $DateTransmissionListe
 * @property $RefLettreTransmisionListe
 *
 * @property Signer[] $signers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pv extends Model
{
    protected $table = 'pv';
    protected $primaryKey = 'CodePV';


    static $rules = [
        'Reference_PV' => 'required',
        'DateDebutSession' => 'required|date',
        'DateFinSession' => 'required|date|after_or_equal:DateDebutSession',
        'AnneeCivile' => 'required|numeric',
        'NoteBasPage' => 'required',
        'DateTransmissionListe' => '',
        'RefLettreTransmisionListe' => '',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Reference_PV',
        'DateDebutSession',
         'DateFinSession',
        'AnneeCivile', 'NoteBasPage',
        'DateTransmissionListe',
        'RefLettreTransmisionListe',
        'statut'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signers()
    {
        return $this->hasMany('App\Models\Signer', 'CodePV', 'CodePV');
    }
    public function demandes()
    {
        return $this->hasMany('App\Models\AssocPvDemande', 'CodePV', 'CodePV');
    }

}
