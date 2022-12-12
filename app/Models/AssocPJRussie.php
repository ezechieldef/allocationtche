<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocPJRussie extends Model
{
    use HasFactory;
    protected $table ='assoc_pj_russie';
    protected $fillable =['demande_id','piece_jointe','url'];

}
