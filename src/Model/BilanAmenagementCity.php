<?php

namespace App\Model;

class BilanAmenagementCity
{
    public function __construct(
        public float $noteDebutMandat,
        public float $noteFinMandat,
        public float $cyclabilite,
        public float $evolutionSurLeMandat,
        public float $noteAmenagement
    )
    {
    }
}