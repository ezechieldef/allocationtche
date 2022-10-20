<?php

namespace App\Models;

class CorrespondanceCode
{

    public $resultat;
    public function univSynonyme($champ)
    {
        $res = $this->synonymesUniversiteP1($champ);
        $lt = array();
        foreach ($res as $value) {
            $r = Universite::find($value);
            if (!is_null($r)) {
                $lt[] = $r;
            }
        }
        $this->resultat = $lt;
        return $this->resultat;
    }
    public function etsSynonyme($champ)
    {
        $res = $this->synonymesEtablissementP1($champ);
        $lt = array();
        foreach ($res as $value) {
            $r = Etablissement::find($value);
            if (!is_null($r)) {
                $lt[] = $r;
            }
        }
        $this->resultat = $lt;
        return $this->resultat;
    }
   
    public function filSynonyme($champ)
    {
        $res = $this->synonymesFiliereP1($champ);
        $lt = array();
        foreach ($res as $value) {
            $r = Filiere::find($value);
            if (!is_null($r)) {
                $lt[] = $r;
            }
        }
        $this->resultat = $lt;
        return $this->resultat;
    }

    public function synonymesUniversiteP1($mot)
    {
        $tab = CorrespondanceUniversite::all()->toArray();
        $result = array();
        $toIgnore = array();


        $res = $this->getSecondChamp($mot, $tab, $toIgnore);
        $result = array_unique(array_merge($result, $res));

        while (count(array_diff($result, $toIgnore)) != 0) {
            $temp = array_diff($result, $toIgnore);
            $res = $this->getSecondChamp(array_values($temp)[0], $tab, $toIgnore);
            $result = array_unique(array_merge($result, $res));
        }

        $result = array_diff($result, [$mot]);

        return $result;
    }


    public function synonymesEtablissementP1($mot)
    {
        $tab = CorrespondanceEtablissement::all()->toArray();
        $result = array();
        $toIgnore = array();
        //echo json_encode($mot);

        $res = $this->getSecondChamp($mot, $tab, $toIgnore);
        $result = array_unique(array_merge($result, $res));

        while (count(array_diff($result, $toIgnore)) != 0) {
            $temp = array_diff($result, $toIgnore);
            $res = $this->getSecondChamp(array_values($temp)[0], $tab, $toIgnore);
            $result = array_unique(array_merge($result, $res));
        }

        $result = array_diff($result, [$mot]);

        return $result;
    }
    public function synonymesFiliereP1($mot)
    {
        $tab = CorrespondanceFiliere::all()->toArray();
        $result = array();
        $toIgnore = array();

        $res = $this->getSecondChamp($mot, $tab, $toIgnore);
        $result = array_unique(array_merge($result, $res));

        while (count(array_diff($result, $toIgnore)) != 0) {
            $temp = array_diff($result, $toIgnore);
            $res = $this->getSecondChamp(array_values($temp)[0], $tab, $toIgnore);
            $result = array_unique(array_merge($result, $res));
        }

        $result = array_diff($result, [$mot]);

        return $result;
    }
    public function getSecondChamp($val1, $tab, &$toIgnore, $champ1 = 'champ1', $champ2 = 'champ2')
    {
        $res = array();
        foreach ($tab as $key => $ligne) {
            if (in_array($val1, $toIgnore)) {
                continue;
            }
            if ($ligne[$champ1] == $val1) {
                $res[] = $ligne[$champ2];
            }
            if ($ligne[$champ2] == $val1) {
                $res[] = $ligne[$champ1];
            }
        }
        $toIgnore[] = $val1;

        return $res;
    }
}
