<?php

namespace App\Model;

class BilanGlobalCity implements FromCSVFile
{
    const REVE = "1 - ReVE";
    const AMENAGEMENTS = "2 - Aménagements";
    const INTERMODALITE = "3 - Intermodalité";
    const VILLE_APAISEE = "4 - Ville apaisée";
    const GENERATION_VELO = "5 - Génération vélo";
    const AUTRES = "Autres";
    const NOTE_GLOBALE_SANS_BONUS = "Note globale (sans bonus)";
    const NOTE_GLOBALE_AVEC_BONUS = "Note globale (avec bonus)";
    const NOTE = "Note";
    const RANG = "Rang";
    const FILE_CSV = 'Bilan mandat (avec retour mairies) - Bilan global.csv';

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

    public static function getCSVFile(): string
    {
        return self::FILE_CSV;
    }
}