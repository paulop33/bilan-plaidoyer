<?php

namespace App\Model;

class BilanAmenagementCity implements FromCSVFile
{

    const FIELD_NOTEDEBUTMANDAT = 'notedebutmandat';
    const FIELD_NOTEFINMANDAT = 'notefinmandat';
    const FIELD_CYCLABILITE = 'Cyclabilité';
    const FIELD_EVOLUTIONSURLEMANDAT = 'Evolution sur le mandat';
    const FIELD_NOTEAMENAGEMENT = 'Bilan aménagement';
    const FILE_CSV = 'Bilan mandat (avec retour mairies) - 2 - Aménagements.csv';

    public function __construct(
        public float $noteDebutMandat,
        public float $noteFinMandat,
        public float $cyclabilite,
        public float $evolutionSurLeMandat,
        public float $noteAmenagement
    )
    {
    }

    public static function getCSVFile(): string
    {
        return self::FILE_CSV;
    }
}