<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CorrespondanceFiliere
 *
 * @property $id
 * @property $champ1
 * @property $champ2
 *
 * @property Filiere $filiere
 * @property Filiere $filiere
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CorrespondanceFiliere extends Model
{
    protected $table = "correspondance_filiere";

    static $rules = [
        'champ1' => 'required',
        'champ2' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['champ1', 'champ2'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filiere1()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'champ1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filiere2()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'champ2');
    }
    public function synonymes()
    {
        return $this->filiere1()->first()->synonymes();
    }
}
