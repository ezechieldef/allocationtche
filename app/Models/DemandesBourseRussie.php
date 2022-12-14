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
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "G??nie ??lectrique", "libelle" => "G??nie ??lectrique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "G??nie logiciel", "libelle" => "G??nie logiciel"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "G??nie m??canique", "libelle" => "G??nie m??canique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Management de la qualit??", "libelle" => "Management de la qualit??"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "G??nie math??matique et mod??lisation", "libelle" => "G??nie math??matique et mod??lisation"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "M??catronique et robotique", "libelle" => "M??catronique et robotique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Standardisation et m??trologie", "libelle" => "Standardisation et m??trologie"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Sciences v??t??rinaires et zootechnologie", "libelle" => "Sciences v??t??rinaires et zootechnologie"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Cartographie et g??o informatique", "libelle" => "Cartographie et g??o informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "G??nie Chimique", "libelle" => "G??nie Chimique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "S??curit?? informatique", "libelle" => "S??curit?? informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Math??matiques appliqu??es et informatique", "libelle" => "Math??matiques appliqu??es et informatique"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Tourisme et service", "libelle" => "Tourisme et service"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "M??decine g??n??rale", "libelle" => "M??decine g??n??rale"],
            ['niveau' => "LICENCE", 'base'=>'BAC','code' => "Pharmacie", "libelle" => "Pharmacie"],

            ['niveau' => "MASTER", 'base'=>'LICENCE', 'code' => 'Energie renouvelable', "libelle" => "Energie renouvelable"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "G??nie ??lectrique", "libelle" => "G??nie ??lectrique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "G??nie logiciel", "libelle" => "G??nie logiciel"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "G??nie m??canique", "libelle" => "G??nie m??canique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Management de la qualit??", "libelle" => "Management de la qualit??"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "G??nie math??matique et mod??lisation", "libelle" => "G??nie math??matique et mod??lisation"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "M??catronique et robotique", "libelle" => "M??catronique et robotique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Standardisation et m??trologie", "libelle" => "Standardisation et m??trologie"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Sciences v??t??rinaires et zootechnologie", "libelle" => "Sciences v??t??rinaires et zootechnologie"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Cartographie et g??o informatique", "libelle" => "Cartographie et g??o informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "G??nie Chimique", "libelle" => "G??nie Chimique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "S??curit?? informatique", "libelle" => "S??curit?? informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Math??matiques appliqu??es et informatique", "libelle" => "Math??matiques appliqu??es et informatique"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "MASTER", 'base'=>'LICENCE','code' => "Tourisme et service", "libelle" => "Tourisme et service"],
            
            ['niveau' => "DOCTORAT", 'base'=>'MASTER', 'code' => 'Energie renouvelable', "libelle" => "Energie renouvelable"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "G??nie ??lectrique", "libelle" => "G??nie ??lectrique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "G??nie logiciel", "libelle" => "G??nie logiciel"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "G??nie m??canique", "libelle" => "G??nie m??canique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "G??nie math??matique et mod??lisation", "libelle" => "G??nie math??matique et mod??lisation"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "M??catronique et robotique", "libelle" => "M??catronique et robotique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Standardisation et m??trologie", "libelle" => "Standardisation et m??trologie"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Ecologie et exploitation des ressources naturelles", "libelle" => "Ecologie et exploitation des ressources naturelles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Sciences v??t??rinaires et zootechnologie", "libelle" => "Sciences v??t??rinaires et zootechnologie"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Cartographie et g??o informatique", "libelle" => "Cartographie et g??o informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Sciences des sols agricoles", "libelle" => "Sciences des sols agricoles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "G??nie Chimique", "libelle" => "G??nie Chimique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Architecture", "libelle" => "Architecture"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "S??curit?? informatique", "libelle" => "S??curit?? informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Math??matiques appliqu??es et informatique", "libelle" => "Math??matiques appliqu??es et informatique"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Technologie et conception des produits textiles ", "libelle" => "Technologie et conception des produits textiles"],
            ['niveau' => "DOCTORAT", 'base'=>'MASTER','code' => "Tourisme et service", "libelle" => "Tourisme et service"],

            ['niveau' => "SPECIALISATION", 'base'=>'DOCTORAT', 'code' => 'Sp??cialit?? m??dicale', "libelle" => "Sp??cialit?? m??dicale"],
        ];
    }


    public function pjID($id)
    {
        return $this->hasMany(AssocPJRussie::class, 'demande_id', 'id')->where('piece_jointe', $id)->get();
    }
}
