<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 *
 * @property $CodeLot
 * @property $CodePV
 * @property $Commissaire
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $Numero
 *
 * @property Pv $pv
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lot extends Model
{

    protected $table = 'lots';
    protected $primaryKey = 'CodeLot';
    static $rules = [
        //'CodeLot' => 'required',
        'CodePV' => 'required',
        'Commissaire' => 'required',
        'status' => 'required',
        'Numero' => 'required|unique:lots,numero',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeLot', 'CodePV', 'Commissaire', 'status', 'Numero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pv()
    {
        return $this->hasOne('App\Models\Pv', 'CodePV', 'CodePV');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Commissaire');
    }


    public function demandes()
    {

        return $this->hasMany('App\Models\AssocLotsDemande', 'CodeLot', 'CodeLot');
    }



    public function groups()
    {
        return DB::select(
            "SELECT E.CodeFiliere, D.CodeAnneeEtude, D.CodeAnneeAcademique, D.CodeNatureAllocation, count(E.CodeEtudiant) as effectif from
                                                    assoc_lots_demande A, demande_allocation D , etudiant E
                                                    WHERE D.CodeEtudiant= E.CodeEtudiant AND
                                                    D.idtransaction!='' AND A.CodeDemandeAllocation=D.CodeDemandeAllocation
                                                    AND A.CodeLot= ?
                                                     GROUP BY E.CodeFiliere, D.CodeAnneeEtude, D.CodeNatureAllocation , D.CodeAnneeAcademique",
            [$this->CodeLot]
        );

        // return $this->hasMany('App\Models\AssocLotsDemande', 'CodeLot', 'CodeLot')->join('demande_allocation', 'demande_allocation.CodeDemandeAllocation', 'assoc_lots_demande.CodeDemandeAllocation')->join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant');
        //groupby('etudiant.CodeFiliere, demande_allocation.CodeAnneeEtude, demande_allocation.CodeNatureAllocation');

    }
    public function detailGroup($map)
    {
        return $this->hasMany('App\Models\AssocLotsDemande', 'CodeLot', 'CodeLot')
        ->join('demande_allocation', 'demande_allocation.CodeDemandeAllocation', 'assoc_lots_demande.CodeDemandeAllocation')
        ->join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
        ->where('CodeAnneeAcademique', $map->CodeAnneeAcademique)
        ->where('CodeFiliere', $map->CodeFiliere)
        ->where('CodeNatureAllocation', $map->CodeNatureAllocation)
        ->where('CodeAnneeEtude', $map->CodeAnneeEtude)->get()
        ;
    }
}
