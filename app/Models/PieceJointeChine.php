<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointeChine extends Model
{
    use HasFactory;
    protected $table ='piece_jointe_chine';
    protected $fillable =['nom_pj','description'];
}
