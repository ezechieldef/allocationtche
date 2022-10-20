<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CorrespEtsSelection
 *
 * @property $id
 * @property $CodeEtablissement1
 * @property $etablissementSelection
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CorrespEtsSelection extends Model
{
    protected $table ='corresp_ets_selection';
    static $rules = [
		'CodeEtablissement1' => 'required',
		'etablissementSelection' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodeEtablissement1','etablissementSelection'];


    public function etablissement1()
    {
        return $this->hasOne(Etablissement::class, 'CodeEtablissement', 'CodeEtablissement1');
    }
    public function etsSynonymeSelection()
    {
        return $this->where('CodeEtablissement1', $this->CodeEtablissement1)->get();
    }


}
