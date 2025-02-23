<?php

namespace App\Model;

class BilanGenerationVeloCity implements FromCSVFile
{
    const NBRUESAUXENFANT = 'nbRuesAuxEnfants';
    const NBRUESAUXENFANTFUTURS = 'nbRuesAuxEnfants futur';
    const NBECOLES = 'nbEcole';
    const EXCURSION = 'excursion';
    const PEDIBUSVELOBUS = 'pédibusvelobus';
    const SRAV = 'SRAV';
    const PROJETENCOURS = 'Projets en cours (infos non exhaustives)';
    const NOTEGENERATIONVELO = 'Note génération vélo';

    const FILE_CSV = 'Bilan mandat (avec retour mairies) - 5 - Génération vélo.csv';

    public function __construct(
        public int $nbRuesAuxEnfant,
        public int $nbRuesAuxEnfantFuturs,
        public int $nbEcoles,
        public bool $pedibusVelobus,
        public bool $srav,
        public float $noteGenerationVelo,
        public ?bool $excursion = null,
        public ?bool $projetEnCours = null,
    )
    {
    }

    public static function getCSVFile(): string
    {
        return self::FILE_CSV;
    }
}