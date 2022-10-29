<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;



class DemandeAllocationUPB extends Model
{

    protected $table = "demande_allocation";
    protected $primaryKey = 'CodeDemandeAllocation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'CodeAnneeEtude',
        'CodeEtudiant',
        'CodePV',
        'CodeLot',
        'CodeAnneeAcademique',
        'CodeListe',
        'CodeTypeDemande',
        'CodeNatureAllocation',
        'CodeBanque',
        'CodeSerie',
        'MotifRejet',
        'ResultatAcademique',
        'Situationanterieure',
        'Redsuccessif',
        'Avissis',
        'miseajouravissis',
        'Avicommission',
        'RIB',
        'Tauxallocation',
        'NumeroLettreTransmission',
        'Datetransmission',
        'Retenue',
        'NomFichierTresor',
        'StatutPaiement',
        'UtilisateurDemande',
        'DateDemande',
        'idtransaction',
        'referencesselection',
        'typeselection',
        'TresorNatureAllocation',
        'Tresormatricule',
        'CodeDemandeAllocation',
        'RIB_valide'
    ];

    public static function getFillableArray(array $tab)
    {
        $fillable = [

            'CodeAnneeEtude',
            'CodeEtudiant',
            'CodePV',
            'CodeLot',
            'CodeAnneeAcademique',
            'CodeListe',
            'CodeTypeDemande',
            'CodeNatureAllocation',
            'CodeBanque',
            'CodeSerie',
            'MotifRejet',
            'ResultatAcademique',
            'Situationanterieure',
            'Redsuccessif',
            'Avissis',
            'miseajouravissis',
            'Avicommission',
            'RIB',
            'Tauxallocation',
            'NumeroLettreTransmission',
            'Datetransmission',
            'Retenue',
            'NomFichierTresor',
            'StatutPaiement',
            'UtilisateurDemande',
            'DateDemande',
            'idtransaction',
            'referencesselection',
            'typeselection',
            'TresorNatureAllocation',
            'Tresormatricule',
            'CodeDemandeAllocation',
            'RIB_valide'
        ];
        $t = array();
        foreach ($tab as $key => $value) {
            if (in_array($key, $fillable)) {
                $t[$key] = $value;
            }
        }
        return $t;
    }

    /**
     * Get the user associated with the DemandeAllocationUPB
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class, 'CodeEtudiant', 'CodeEtudiant');
    }

    public static function rechercher(int $anne_academique, array $map)
    {
        $res = DemandeAllocationUPB::join('etudiant', 'etudiant.CodeEtudiant', 'demande_allocation.CodeEtudiant')
            ->join('filiere', 'etudiant.CodeFiliere', 'filiere.codeFiliere')
            ->join('etablissement', 'filiere.CodeEtablissement', 'etablissement.CodeEtablissement')
            ->where('CodeAnneeAcademique', $anne_academique)
            ->where('NomEtudiant', $map['NomEtudiant'])
            ->where('PrenomEtudiant', $map['PrenomEtudiant'])
            ->where('DateNaissanceEtudiant', $map['DateNaissanceEtudiant']);
        if (!$res->exists()) {
            return null;
        }
        return $res->first();
    }

    public static function demandeSansLot()
    {
        return DemandeAllocationUPB::whereNotIn('CodeDemandeAllocation', AssocLotsDemande::pluck('CodeDemandeAllocation')->toArray());
    }
    public static function demandeAvecLot()
    {
        return DemandeAllocationUPB::whereIn('CodeDemandeAllocation', AssocLotsDemande::pluck('CodeDemandeAllocation')->toArray());
    }
}
