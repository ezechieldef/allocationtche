<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class Banque extends Model
{

    protected $table="banque";
    protected $primaryKey = 'CodeBanque';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CodeBanque',
        'LibellecourtBanque',
        'LibellelongBanque',
        'regex'
    ];



}
