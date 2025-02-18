<?php

namespace App\Model;

class BilanGlobalCity
{
    const REVE = "1 - ReVE";
    const AMENAGEMENTS = "2 - Aménagements";
    const INTERMODALITE = "3 - Intermodalité";
    const VILLE_APAISEE = "4 - Ville apaisée";
    const GENERATION_VELO = "5 - Génération vélo";
    const AUTRES = "Autres";
    const NOTE_GLOBALE_SANS_BONUS = "Note globale\n(sans bonus)";
    const NOTE_GLOBALE_AVEC_BONUS = "Note globale \n(avec bonus)";
    const NOTE = "Note";
    const RANG = "Rang";
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