<?php

namespace App\Exports;

use App\Models\DemandeAllocationUPB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRIBValidation implements FromCollection ,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $codebanque;
    public function __construct($codeb)
    {
        $this->codebanque = $codeb;
    }
    public function collection()
    {
        $v = DemandeAllocationUPB::join("etudiant", 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
        ->where('CodeBanque', $this->codebanque)
            ->where('RIB_valide', '!=', 'oui')
            ->get(['CodeDemandeAllocation', 'NPI', 'NomEtudiant', 'PrenomEtudiant', 'RIB']);
        return $v;
    }

    public function headings() :array
    {
        return [
            'ID','NIP','Nom','Prénoms','RIB'
        ];
    }
}
