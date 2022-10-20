<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class SelectionNouveau extends Model
{

    protected $table = "resultats";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];
    public static function rechercher(int $anne_academique, array $map, array $saisi)
    {
        $res = SelectionNouveau::where('numero_table', $saisi['NumeroDeTable'])
            ->where('datnais', $saisi['DateNaissanceEtudiant'])
            ->where('CodeAnneeAcademique', $anne_academique)
            ->where('rais_sociale', $map['NomEtudiant'] . ' ' . $map['PrenomEtudiant']);
        if (!$res->exists()) {
            return null;
        }
        return $res->first();
    }
}
