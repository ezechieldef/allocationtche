<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class Etablissement extends Model
{

    protected $table = "etablissement";
    protected $primaryKey = 'CodeEtablissement';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CodeEtablissement',
        'LibelleEtablissement',
        'CodeUniversite',
        'CodeTypeEtablissement',
        'valider'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function universite()
    {
        return $this->hasOne('App\Models\Universite', 'CodeUniversite', 'CodeUniversite');
    }

    public function synonymes()
    {
        return (new CorrespondanceCode())->etsSynonyme($this->CodeEtablissement);
    }
    public function synonymesSelection()
    {
        // return (new CorrespondanceCode())->etsSynonymeSelection($this->CodeEtablissement);
        return CorrespEtsSelection::where('CodeEtablissement1', $this->CodeEtablissement);
    }
    public static function correspondre($ets1, $ets2)
    {
        $ets = null;
        $ets = Etablissement::find($ets1) ?? Etablissement::find($ets2) ?? null;

        if (is_null($ets)) {
            return null;
        }
        $res = $ets->synonymes();
        $res[]=$ets;
        $champ2 = $ets->CodeEtablissement == $ets1 ? $ets2 : $ets1;

        foreach ($res as  $syn) {
            if ($syn->CodeEtablissement == $champ2) {
                return true;
            }
        }

        return false;
    }
    public static function correspondreSelection($codeets, $etsselection)
    {
        $temp = Etablissement::find($codeets) ?? null;
        if (is_null($temp)) {
            return false;
        }
        $synoets =  $temp->synonymes();
        $synoets[] = $temp;

        foreach ($synoets as $ets) {
            $r = CorrespEtsSelection::where('CodeEtablissement1', $ets->CodeEtablissement)
                ->where('etablissementSelection', $etsselection);
            if ($r->exists()) {

                return true;
            }
        }
        return false;
    }
}
