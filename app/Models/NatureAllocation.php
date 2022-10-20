<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CodeNatureAllocation
 * @property string $CodeNatureAllocation
 * @property string $libele
 * @property string $agelimite
 * @property string $LibelleNatureAllocation
 * @property string $PeriodiciteNatureAllocation
 * @property string $DureFormation
 * @property string $Cycle
 * @property string $LibelleNatureAllocation
 * @property string $PeriodiciteNatureAllocation
 * @property string $DureFormation
 * @property string $Cycle
 * @property int    $periodicite
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $Agelimite
 * @property int    $Agelimite
 */
class NatureAllocation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nature_allocation';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CodeNatureAllocation';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CodeNatureAllocation', 'LibelleNatureAllocation', 'PeriodiciteNatureAllocation', 'DureFormation', 'cycle_id', 'agelimite', 'created_at', 'updated_at', 'LibelleNatureAllocation', 'PeriodiciteNatureAllocation', 'DureFormation', 'Cycle', 'Agelimite', 'LibelleNatureAllocation', 'PeriodiciteNatureAllocation', 'DureFormation', 'Cycle', 'Agelimite'
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
        'CodeNatureAllocation' => 'string', 'LibelleNatureAllocation' => 'string', 'PeriodiciteNatureAllocation' => 'int', 'libele' => 'string', 'agelimite' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'LibelleNatureAllocation' => 'string', 'PeriodiciteNatureAllocation' => 'string', 'DureFormation' => 'string', 'Cycle' => 'string', 'Agelimite' => 'int', 'LibelleNatureAllocation' => 'string', 'PeriodiciteNatureAllocation' => 'string', 'DureFormation' => 'string', 'Cycle' => 'string', 'Agelimite' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
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
