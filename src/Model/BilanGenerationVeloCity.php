<?php

namespace App\Model;

class BilanGenerationVeloCity
{
    const NBRUESAUXENFANT = 'nbRuesAuxEnfants';
    const NBRUESAUXENFANTFUTURS = 'nbRuesAuxEnfants futur';
    const NBECOLES = 'nbEcole';
    const EXCURSION = 'excursion';
    const PEDIBUSVELOBUS = 'pédibusvelobus';
    const SRAV = 'SRAV';
    const PROJETENCOURS = 'Projets en cours (infos non exhaustives)';
    const NOTEGENERATIONVELO = 'Note génération vélo';


    public function __construct(
        public int $nbRuesAuxEnfant,
        public int $nbRuesAuxEnfantFuturs,
        public int $nbEcoles,
        public bool $excursion,
        public bool $pedibusVelobus,
        public bool $srav,
        public bool $projetEnCours,
        public float $noteGenerationVelo,
    )
    {
    }
}