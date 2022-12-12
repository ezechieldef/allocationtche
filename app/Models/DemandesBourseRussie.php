<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DemandesBourseRussie
 *
 * @property $id
 * @property $user_id
 * @property $code
 * @property $NPI
 * @property $nom
 * @property $prenoms
 * @property $date_naissance
 * @property $lieu_naissance
 * @property $sexe
 * @property $diplome_de_base
 * @property $serie_ou_filiere
 * @property $annee_obtention_bac
 * @property $moyenne_bac
 * @property $mention
 * @property $niveau_sollicite
 * @property $filiere_choisi
 * @property $status_bourse
 * @property $contact_whatsapp
 * @property $contact_parent
 * @property $imprime
 * @property $created_at
 * @property $updated_at
 *
 * @property AssocPjRussie[] $assocPjRussies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DemandesBourseRussie extends Model
{
    protected $table='demandes_bourse_russie';
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
		'moyenne_bac' => 'required|between:0,20',
		'mention' => 'required',
		'niveau_sollicite' => 'required|in:LICENCE,MASTER,DOCTORAT,SPECIALISATION',
		'filiere_choisi' => 'required',
		'status_bourse' => 'required',
		'contact_whatsapp' => 'required',
		'contact_parent' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','code','NPI','nom','prenoms','date_naissance','lieu_naissance','sexe','diplome_de_base','serie_ou_filiere','annee_obtention_bac','moyenne_bac','mention','niveau_sollicite','filiere_choisi','status_bourse','contact_whatsapp','contact_parent','imprime'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assocPjRussies()
    {
        return $this->hasMany('App\Models\AssocPjRussie', 'demande_id', 'id');
    }

    public static function listeFiliere()
    {
        return [
            ['niveau' => "LICENCE", 'base'=>'BAC', 'code' => 'Energie renouvelable', "libelle" => "Energie renouvelable"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Génie électrique", "libelle" => "Génie électrique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Génie logiciel", "libelle" => "Génie logiciel"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Génie mécanique", "libelle" => "Génie mécanique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Management de la qualité", "libelle" => "Management de la qualité"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Génie mathématique et modélisation", "libelle" => "Génie mathématique et modélisation"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Mécatronique et robotique", "libelle" => "Mécatronique et robotique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Standardisation et métrologie", "libelle" => "Standardisation et métrologie"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Sciences vétérinaires et zootechnologie", "libelle" => "Sciences vétérinaires et zootechnologie"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Cartographie et géo informatique", "libelle" => "Cartographie et géo informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Génie Chimique", "libelle" => "Génie Chimique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Sécurité informatique", "libelle" => "Sécurité informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Mathématiques appliquées et informatique", "libelle" => "Mathématiques appliquées et informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Tourisme et service", "libelle" => "Tourisme et service"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Médecine générale", "libelle" => "Médecine générale"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Pharmacie", "libelle" => "Pharmacie"],

            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => 'Energie renouvelable', "libelle" => "Energie renouvelable"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Génie électrique", "libelle" => "Génie électrique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Génie logiciel", "libelle" => "Génie logiciel"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Génie mécanique", "libelle" => "Génie mécanique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Management de la qualité", "libelle" => "Management de la qualité"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Génie mathématique et modélisation", "libelle" => "Génie mathématique et modélisation"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Mécatronique et robotique", "libelle" => "Mécatronique et robotique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Standardisation et métrologie", "libelle" => "Standardisation et métrologie"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Sciences vétérinaires et zootechnologie", "libelle" => "Sciences vétérinaires et zootechnologie"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Cartographie et géo informatique", "libelle" => "Cartographie et géo informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Génie Chimique", "libelle" => "Génie Chimique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Sécurité informatique", "libelle" => "Sécurité informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Mathématiques appliquées et informatique", "libelle" => "Mathématiques appliquées et informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Tourisme et service", "libelle" => "Tourisme et service"],
            
            ['niveau' => "DOCTORAT", 'base'=>'MASTER', 'code' => 'Energie renouvelable', "libelle" => "Energie renouvelable"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Génie électrique", "libelle" => "Génie électrique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Génie logiciel", "libelle" => "Génie logiciel"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Génie mécanique", "libelle" => "Génie mécanique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Génie mathématique et modélisation", "libelle" => "Génie mathématique et modélisation"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Mécatronique et robotique", "libelle" => "Mécatronique et robotique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Standardisation et métrologie", "libelle" => "Standardisation et métrologie"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Sciences vétérinaires et zootechnologie", "libelle" => "Sciences vétérinaires et zootechnologie"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Cartographie et géo informatique", "libelle" => "Cartographie et géo informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Génie Chimique", "libelle" => "Génie Chimique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Sécurité informatique", "libelle" => "Sécurité informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Mathématiques appliquées et informatique", "libelle" => "Mathématiques appliquées et informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Tourisme et service", "libelle" => "Tourisme et service"],

            ['niveau' => "SPECIALISATION", 'base'=>'DOCTORAT', 'code' => 'Spécialité médicale', "libelle" => "Spécialité médicale"],
        ];
    }


    public function pjID($id)
    {
        return $this->hasMany(AssocPJRussie::class, 'demande_id', 'id')->where('piece_jointe', $id)->get();
    }
}
