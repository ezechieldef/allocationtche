<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CorrespFilSelection
 *
 * @property $id
 * @property $CodeFiliere
 * @property $filiereSelection
 * @property $created_at
 * @property $updated_at
 *
 * @property Filiere $filiere
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CorrespFilSelection extends Model
{
    protected $table ='corresp_fil_selection';
    static $rules = [
		'CodeFiliere' => 'required',
		'filiereSelection' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeFiliere','filiereSelection'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filiere()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'CodeFiliere');
    }


}
