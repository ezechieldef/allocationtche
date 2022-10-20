<?php

namespace App\Imports;

use App\Models\Banque;
use App\Models\DemandeAllocationUPB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportRIBs implements ToCollection
{
    /**
     * @param Collection $collection
     */
    protected $codebanque ;
    public function __construct($code)
    {
     $this->codebanque=$code;
    }
    public function collection(Collection $collection)
    {
        $olds = Session::get('errorImport') ?? [];

        //dd($collection);
        foreach ($collection as $row) {

            if (count($row)<4) {
                $olds[] = 'Ligne incomplete ( '.json_encode($row).' )';
                continue;
            }
            $v = DemandeAllocationUPB::join("etudiant", 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
                ->where('CodeDemandeAllocation', $row[0])
                ->where('CodeBanque', $this->codebanque)
                ->where('NPI', $row[1]);
            if ($v->exists()) {
                /*
                row:
                0 : CodeDemandeAllocation,
                1 : NPI,
                2 : Nom,
                3 : Prénom,
                4 : RIB */
                $dem = DemandeAllocationUPB::find($row[0]);
                $banque = Banque::find($dem->CodeBanque);
                if (preg_match('/^' . $banque->regex . '/', $row[4])) {
                    $dem->update([
                        'RIB' => $row[4],
                        'RIB_valide' => 'oui'
                    ]);
                    //$dem->save();
                } else {
                    $olds[] = 'le RIB ' . $row[4] . ' ne respecte pas le format des RIB de la banque : ' . $banque->CodeBanque;
                }
            }else{
                $olds[] = 'Étudiant / Demande portant l\'ID : ' . $row[4] . ' est introuvable dans votre banque';
            }
        }
        Session::put('errorImport', $olds);
    }
}
