<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MotifsRejet
 *
 * @property $id
 * @property $libele
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MotifsRejet extends Model
{
    protected $table ='motifs_rejet';
    static $rules = [
		'libele' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libele'];



}
