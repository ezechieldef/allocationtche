<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DemandesBourseChinoise
 *
 * @property $id
 * @property $user_id
 * @property $nom
 * @property $prenoms
 * @property $date_naissance
 * @property $lieu_naissance
 * @property $sexe
 * @property $serie_ou_filiere
 * @property $annee_obtention_bac
 * @property $moyenne_bac
 * @property $mention
 * @property $filiere_choisi
 * @property $status_bourse
 * @property $contact_whatsapp
 * @property $contact_parent
 * @property $imprime
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DemandesBourseChinoise extends Model
{
    protected $table = 'demandes_bourse_chinoise';
    static $rules = [
        'user_id' => 'required',
        'nom' => 'required',
        'prenoms' => 'required',
        'date_naissance' => 'required|before_or_equal:today',
        'lieu_naissance' => 'required',
        'sexe' => 'required',
        'diplome_de_base' => 'required',
        'serie_ou_filiere' => 'required',
        'annee_obtention_bac' => 'required',
        'moyenne_bac' => 'required',
        'mention' => 'required',
        'niveau_sollicite' => 'required|in:LICENCE,MASTER,DOCTORAT,SPECIALISATION',
        'filiere_choisi' => 'required',
        'status_bourse' => 'required',
        'contact_whatsapp' => 'required',
        'contact_parent' => 'required',
    ];
    public static function listeFiliere()
    {


        return [
            ['niveau' => "LICENCE", 'base'=>'BAC', 'code' => 'Technologie et sciences intelligentes', "libelle" => "Technologie et sciences intelligentes"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Maintenance d'industrie agroalimentaire", "libelle" => "Maintenance d'industrie agroalimentaire"],

            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => 'Génie énergétique et ingénierie thermo physique', "libelle" => "Génie énergétique et ingénierie thermo physique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => "Sécurité des systèmes d'information et réseaux", "libelle" => "Sécurité des systèmes d'information et réseaux"],
            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => 'Télédétection agricole', "libelle" => "Télédétection agricole"],
            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => 'Analyse et calcul des informations complexes', "libelle" => "Analyse et calcul des informations complexes"],

            ['niveau' => "DOCTORAT", 'base'=>'MASTER', 'code' => 'Pathologie des plantes', "libelle" => "Pathologie des plantes"],

            ['niveau' => "SPECIALISATION", 'base'=>'DOCTORAT', 'code' => 'Réanimation pédiatrique', "libelle" => "Réanimation pédiatrique"],

        ];
    }
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'user_id', 'NPI',
        'niveau_sollicite', 'diplome_de_base', 'nom', 'prenoms', 'date_naissance', 'lieu_naissance', 'sexe', 'serie_ou_filiere', 'annee_obtention_bac', 'moyenne_bac', 'mention', 'filiere_choisi', 'status_bourse', 'contact_whatsapp', 'contact_parent', 'imprime'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


    public function pjID($id)
    {
        return $this->hasMany(AssocPJChine::class, 'demande_id', 'id')->where('piece_jointe', $id)->get();
    }
}
