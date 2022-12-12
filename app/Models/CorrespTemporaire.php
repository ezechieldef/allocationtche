<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrespTemporaire extends Model
{
    use HasFactory;
     use HasFactory;
    protected $table="corresp_temporaire";
    protected $fillable =['ancien',"nouveau"];

    public function filiere1()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'ancien');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filiere2()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'nouveau');
    }
}
