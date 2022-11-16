<?php

namespace App\Http\Controllers;

use App\Models\ReglageDeBase;
use Illuminate\Http\Request;

class ParamsController extends Controller
{
    public function ouverture()
    {
        $all =request()->all();
        $reg= ReglageDeBase::first();
        $suc=false;
        if (!is_null($all['DateOuverture'] ?? null) && !is_null($all['DateFermeture'] ?? null)) {

            request()->validate([
                'DateOuverture'=>'date|after_or_equal:today',
                'DateFermeture'=>'date|after_or_equal:DateOuverture',
            ]);
            $reg->update(['DateOuverture'=>$all['DateOuverture'], 'DateFermeture'=>$all['DateFermeture']]);
            $suc=true;
        }
        $reg= ReglageDeBase::first();
        return view('upb.form_ouverture', compact('reg','suc'));
    }
}
