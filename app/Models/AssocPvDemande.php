<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $CodePV
 * @property int    $CodeDemandeAllocation
 * @property string $Avis
 */
class AssocPvDemande extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assoc_pv_demande';
    static $rules = [
		'CodePV' => 'required',
		'CodeDemandeAllocation' => 'required',
		'Avis' => 'required',
    ];
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CodePV', 'CodeDemandeAllocation', 'Avis', 'MotifRejet'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'CodePV' => 'int',
        'CodeDemandeAllocation' => 'int',
        'Avis' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
