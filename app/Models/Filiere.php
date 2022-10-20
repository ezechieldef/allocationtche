<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class Filiere extends Model
{

    protected $table = "filiere";
    protected $primaryKey = 'CodeFiliere';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CodeFiliere',
        'LibelleFiliere',
        'CodeEtablissement',
        'DureFormation',
        'valider'
    ];
    public function etablissement()
    {
        return $this->hasOne('App\Models\Etablissement', 'CodeEtablissement', 'CodeEtablissement');
    }

    public function synonymes()
    {
        return (new CorrespondanceCode())->filSynonyme($this->CodeFiliere);
    }

    public static function correspondre($fil1, $fil2)
    {
        $fil = null;
        $fil = Filiere::find($fil1) ?? Filiere::find($fil2) ?? null;

        if (is_null($fil)) {
            return null;
        }
        $res = $fil->synonymes();
        $res[]=$fil;
        $champ2 = $fil->CodeFiliere == $fil1 ? $fil2 : $fil1;

        foreach ($res as  $syn) {
            if ($syn->CodeFiliere == $champ2) {
                return true;
            }
        }

        return false;
    }

    public static function correspondreSelection($codefil, $etsselection)
    {
        $temp = Filiere::find($codefil) ?? null;
        if (is_null($temp)) {
            return false;
        }
        $synofil =  $temp->synonymes();
        $synofil[] = $temp;

        foreach ($synofil as $fil) {
            $r = CorrespFilSelection::where('CodeFiliere', $fil->CodeFiliere)
                ->where('filiereSelection', $etsselection);
            if ($r->exists()) {
                return true;
            }

        }
        return false;
    }
}
