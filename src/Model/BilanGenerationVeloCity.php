<?php

namespace App\Model;

class BilanGenerationVeloCity
{

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