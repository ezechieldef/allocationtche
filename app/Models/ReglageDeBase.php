<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglageDeBase extends Model
{
    use HasFactory;
    protected $table='reglage_de_base';
    protected $fillable =['DateOuverture','DateFermeture','DBAU','president_CNABAU'];
}
