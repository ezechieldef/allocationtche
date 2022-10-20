<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DipDeBase
 *
 * @property $CodeDipdeBase
 * @property $LibelleDipdeBase
 * @property $Organisateur
 *
 * @property Serie[] $series
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DipDeBase extends Model
{
    protected $table ='dip_de_base';
    static $rules = [
		'CodeDipdeBase' => 'required',
		'LibelleDipdeBase' => 'required',
		'Organisateur' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeDipdeBase','LibelleDipdeBase','Organisateur'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function series()
    {
        return $this->hasMany('App\Models\Serie', 'CodeDipdeBase', 'CodeDipdeBase');
    }


}
