<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointeRussie extends Model
{
    use HasFactory;
    protected $table='piece_jointe_russie';
    protected $fillable =['nom_pj','description'];

}
