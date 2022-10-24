<?php

namespace App\Http\Controllers;

use App\Models\AssocPvDemande;
use App\Models\DemandeAllocationUPB;
use App\Models\Pv;
use Illuminate\Http\Request;

class AvisUPB extends Controller
{
    public function aviser($codeDemande)
    {
        //dd(request()->all());

        request()->validate(
            [
                'pv' => 'required',
                'avis_id' => 'required|in:1,2,3',
                'motifs_rejet_id' => 'required_if:avis_id,2,3'
            ]
        );
        $all = request()->all();

        $dem = DemandeAllocationUPB::findOrFail($codeDemande);
        //dd('trouvé');

        $pv = Pv::findOrFail($all['pv']?? '');


        if ($pv->statut=='cloturé') {

            return back()->with('error','Ce PV est cloturé déjà');
        }


        $avis ='';
        if ($all['avis_id']==1) {
            $avis= 'Favorable';
        }elseif($all['avis_id']==2){
            $avis='Réservé';
        }else{
            $avis='Défavorable';
        }

        AssocPvDemande::create([
            'CodePV' => $all['pv'],
            'CodeDemandeAllocation' => $codeDemande,
            'MotifRejet'=>$all['motifs_rejet_id'],
            'Avis'=>  $avis
        ]);
        return back()->with("success",'Succès');
    }

    public function cloturerPV(int $codePV)
    {
        Pv::findOrFail($codePV)->update(['statut'=>'cloturé']);
        return back();
    }
}
