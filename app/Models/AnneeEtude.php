<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeEtude extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'anne_etude';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CodeAnneeEtude';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CodeAnneeEtude',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
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
