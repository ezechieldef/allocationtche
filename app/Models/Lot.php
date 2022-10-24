<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 *
 * @property $CodeLot
 * @property $CodePV
 * @property $Commissaire
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $Numero
 *
 * @property Pv $pv
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lot extends Model
{

    protected $table ='lots';
    protected $primaryKey ='CodeLot';
    static $rules = [
		//'CodeLot' => 'required',
		'CodePV' => 'required',
		'Commissaire' => 'required',
		//'status' => 'required',
		'Numero' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeLot','CodePV','Commissaire','status','Numero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pv()
    {
        return $this->hasOne('App\Models\Pv', 'CodePV', 'CodePV');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Commissaire');
    }

    public function demandes()
    {

        return $this->hasMany('App\Models\AssocLotsDemande', 'CodeLot', 'CodeLot');

    }


}
