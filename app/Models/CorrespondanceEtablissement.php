<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CorrespondanceEtablissement
 *
 * @property $id
 * @property $champ1
 * @property $champ2
 *
 * @property Etablissement $etablissement
 * @property Etablissement $etablissement
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CorrespondanceEtablissement extends Model
{
    protected $table = 'correspondance_etablissement';
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
    public function etablissement2()
    {
        return $this->hasOne('App\Models\Etablissement', 'CodeEtablissement', 'champ2');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etablissement1()
    {
        return $this->hasOne('App\Models\Etablissement', 'CodeEtablissement', 'champ1');
    }
    public $syno;

    public function synoUniv()
    {
    }
    public function synonymes()
    {
        return $this->etablissement1()->first()->synonymes();
    }
}
