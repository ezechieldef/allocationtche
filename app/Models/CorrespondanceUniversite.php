<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CorrespondanceUniversite
 *
 * @property $id
 * @property $champ1
 * @property $champ2
 *
 * @property Universite $universite
 * @property Universite $universite
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CorrespondanceUniversite extends Model
{
    protected $table = 'correspondance_universite';
    static $rules = [
        'champ1' => 'required',

        'champ2' => 'required|different:champ1',
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
    public function universite1()
    {
        return $this->hasOne('App\Models\Universite', 'CodeUniversite', 'champ1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function universite2()
    {
        return $this->hasOne('App\Models\Universite', 'CodeUniversite', 'champ2');
    }

    public function synonymes()
    {
        return (new CorrespondanceCode())->univSynonyme($this->champ1);
    }
}
