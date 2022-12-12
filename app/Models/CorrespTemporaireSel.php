<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrespTemporaireSel extends Model
{
    use HasFactory;
    protected $table="corresp_temporaire_sel";
    protected $fillable =['ancien',"nouveau"];

    public function filiere1()
    {
        return $this->hasOne('App\Models\Filiere', 'CodeFiliere', 'ancien');
    }


}
