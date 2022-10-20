<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Foreach_;

/**
 * Class Universite
 *
 * @property $CodeUniversite
 * @property $LibelleLongUniversite
 * @property $UniversiteActif
 *
 * @property Etablissement[] $etablissements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Universite extends Model
{
    protected $table = 'universite';
    protected $primaryKey = 'CodeUniversite';
    public $incrementing = false;
    protected $keyType = 'string';

    static $rules = [
        'CodeUniversite' => 'required',
        'LibelleLongUniversite' => 'required',
        'UniversiteActif' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeUniversite', 'LibelleLongUniversite', 'UniversiteActif'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etablissements()
    {
        return $this->hasMany('App\Models\Etablissement', 'CodeUniversite', 'CodeUniversite');
    }

    public function synonymes()
    {
        return (new CorrespondanceCode())->univSynonyme($this->CodeUniversite);
    }

    public static function correspondre($univ1, $univ2)
    {
        $univ = null;
        $univ = Universite::find($univ1) ?? Universite::find($univ2) ?? null;

        if (is_null($univ)) {
            return null;
        }
        $res = $univ->synonymes();
        $champ2 = $univ->CodeUniversite == $univ1 ? $univ2 : $univ1;

        foreach ($res as  $syn) {
            if ($syn->CodeUniversite == $champ2) {
                return true;
            }
        }

        return false;
    }
}
