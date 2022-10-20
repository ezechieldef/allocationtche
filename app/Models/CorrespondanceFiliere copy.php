<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class CorrespondanceFiliere extends Model
{

    protected $table = "correspondance_filiere";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'champ1',
        'champ2',
    ];
    protected $tabglob = [];
    public function synonymes($mot)
    {
        $tab = $this->all()->toArray();
        $result = array();
        $toIgnore = array();
        

        $res = $this->getSecondChamp($mot, $tab, $toIgnore);
        $result = array_unique(array_merge($result, $res));

        while (count(array_diff($result, $toIgnore)) != 0) {
            $temp = array_diff($result, $toIgnore);
            $res = $this->getSecondChamp(array_values($temp)[0], $tab, $toIgnore);
            $result = array_unique(array_merge($result, $res));
        }

        $result= array_diff($result,[$mot]);
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($this->tabglob);
        // echo "</pre>";
        return $result;
    }
    public function getSecondChamp($val1, $tab, &$toIgnore,)
    {
        $res = array();
        foreach ($tab as $key => $ligne) {
            if (in_array($val1, $toIgnore)) {
                continue;
            }
            if ($ligne['champ1'] == $val1) {
                $res[] = $ligne['champ2'];
            }
            if ($ligne['champ2'] == $val1) {
                $res[] = $ligne['champ1'];
            }
        }
        $toIgnore[] = $val1;

        return $res;
    }
}
