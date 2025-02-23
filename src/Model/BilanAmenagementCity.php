<?php

namespace App\Model;

class BilanAmenagementCity
{

    const FIELD_NOTEDEBUTMANDAT = 'notedebutmandat';
    const FIELD_NOTEFINMANDAT = 'notefinmandat';
    const FIELD_CYCLABILITE = 'Cyclabilité';
    const FIELD_EVOLUTIONSURLEMANDAT = 'Evolution sur le mandat';
    const FIELD_NOTEAMENAGEMENT = 'Bilan aménagement';

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