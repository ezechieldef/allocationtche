<?php

namespace App\Http\Controllers;

use App\Models\Pv;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\AssocPvDemande;
use App\Models\DemandeAllocationUPB;
use Illuminate\Support\Facades\Auth;

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


        $pv = Pv::findOrFail($all['pv'] ?? '');
        $lot = Lot::where('CodePv', $pv->CodePV)->first();
        if (is_null($lot)) {
            return back()->with('error', 'lot introuvable');
        }
        if ($lot->status != 'OUVERT') {
            return back()->with('error', 'Ce lot n\'est pas ouvert. Aucun avis ne peut être prise en compte pour le moment');
        }
        if ($lot->Commissaire != Auth::user()->id) {
            return back()->with('error', 'Ce lot ne vous a pas été attribué, vous ne pouvez donc pas donner votre avis dessus.');
        }

        if ($pv->statut == 'cloturé') {
            return back()->with('error', 'Ce PV est cloturé déjà');
        }


        $avis = '';
        if ($all['avis_id'] == 1) {
            $avis = 'Favorable';
        } elseif ($all['avis_id'] == 2) {
            $avis = 'Réservé';
        } else {
            $avis = 'Défavorable';
        }

        $old = AssocPvDemande::where('CodePV', $pv->CodePV,)->where('CodeDemandeAllocation', $codeDemande);
        if ($old->exists()) {
            $old = $old->first();
            $old->update([
                'MotifRejet' => $all['motifs_rejet_id'],
                'Avis' =>  $avis
            ]);
        } else {
            AssocPvDemande::create([
                'CodePV' => $all['pv'],
                'CodeDemandeAllocation' => $codeDemande,
                'MotifRejet' => $all['motifs_rejet_id'],
                'Avis' =>  $avis
            ]);
        }

        return back()->with("success", 'Succès');
    }


}
