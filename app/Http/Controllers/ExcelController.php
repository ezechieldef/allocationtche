<?php

namespace App\Http\Controllers;

use App\Exports\ExportRIBValidation;
use App\Imports\ImportRIBs;
use Illuminate\Http\Request;
use Excel;

class ExcelController extends Controller
{
    public function exportRIBValidation(string $codebanque)
    {

        return Excel::download(new ExportRIBValidation($codebanque), 'etudiants.xlsx');
    }
    public function importer(string $codebanque)
    {
        # code...
        //dd(request()->all());
        $res = Excel::import(new ImportRIBs($codebanque), request()->file('ribs') );
        return redirect()->back()
            ->with('success', 'Eligible importé avec succès ');
     //   dd($res);
    }
}
