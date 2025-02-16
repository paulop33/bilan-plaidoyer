<?php

namespace App\Model;

class BilanGlobalCity
{

    public function __construct(
        public float $reve,
        public float $amenagement,
        public float $intermodalite,
        public float $villeApaisee,
        public float $generationVelo,
        public float $autre,
        public float $noteGlobaleSansBonus,
        public float $noteGlobaleAvecBonus,
        public string $noteLetter,
    )
    {
    }
}