<?php

namespace App\Http\Controllers;

use App\Models\DemandeAllocationUPB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RIBValidationController extends Controller
{
    public function index()
    {
        $all = request()->all();

        if ($list_ids = ($all['demandeAllocationId'] ??  null)) {
            foreach ($list_ids as $key => $value) {
                if ($value) {
                    $res = DemandeAllocationUPB::where('CodeDemandeAllocation', $key);
                    if ($res->exists()) {
                        $res->first()->update(['RIB_valide' => 'oui']);
                    }
                }
            }
            Alert::toast("Les demandes ci après ont été traité avec success : " . implode(' , ', array_keys($list_ids)), 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            return redirect('/validation-RIB');
        }
        if (!is_null($all['CodeDemandeAllocation']??null) && !is_null($all['RIB']??null)) {
            $res = DemandeAllocationUPB::where('CodeDemandeAllocation', $all['CodeDemandeAllocation']);
            if ($res->exists()) {
                $res->first()->update($all);
            }
        }
        return view('upb.banque_validation');
    }
}
