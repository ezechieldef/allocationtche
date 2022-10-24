<?php

namespace App\Http\Controllers;

use App\Models\ArchiveAllocataire;
use App\Models\DemandeAllocationUPB;
use Illuminate\Http\Request;

class AdminDemandeUPB extends Controller
{
    public function index()
    {
        $dem = DemandeAllocationUPB::join('etudiant','etudiant.CodeEtudiant','demande_allocation.CodeEtudiant')
        ->where('idtransaction','!=','')->get();
        return view('upb.les_demandes',['dem'=>$dem]);
    }
    public function consulter()
    {
        return view(('upb.consulter'));
    }
    public function consulterPost()
    {
        request()->validate(['Matricule'=>'required', 'Universite'=>'required']);
        $all=request()->all();
        $mat=$all['Matricule'];
        $univ=$all['Universite'];
        $dem = DemandeAllocationUPB::join("etudiant", 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
        ->where('CodeFiliere', 'LIKE', '%-'.$univ )
        ->where('Matricule',$mat)->get();
        $archive = ArchiveAllocataire::where('Matricule',$mat)->where('LibelleCourtUniversite',$univ)->orderby('Annee','DESC')->get();

        foreach ($archive as $value) {
            $dem[]=$value;
        }
        return view('upb.consulter',['list'=>$dem]);
    }
}
