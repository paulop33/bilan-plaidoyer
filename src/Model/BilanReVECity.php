<?php

namespace App\Model;

class BilanReVECity
{
    public function __construct(
        public string $nombreDeLigneCorrespondant,
        public bool $dessertePointsInteretMajeur,
        public bool $desserteCentreVille,
        public float $noteProjetReve,
        public bool $constructionALEtude,
        public bool $constructionEntierementALEtude,
        public bool $constructionCommencee,
        public bool $constructionTerminee,
        public float $noteRealisationReVE,
        public float $noteGlobalReVE
    )
    {
    }
}