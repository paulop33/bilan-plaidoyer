<?php

namespace App\Model;

class BilanIntermodaliteCity implements FromCSVFile
{
    const P_V_VELOSTATIONS_PROJETEES = "P+V (vélostations projetées)";
    const P_V_ABRI_VELO = "P+V (abri vélo)";
    const GARE_VELO_STATION_AVEC_INTENTIONS = "Gare - vélo station (avec intentions)";
    const GARE_ABRIS_VELO = "Gare - abris vélo";
    const DETAIL = "Détail";
    const GARE_ARCEAUX = "Gare - Arceaux";
    const DEMANDE_PLAIDOYER = "Demande plaidoyer";
    const METSTATION = "Metstation";
    const NOTE_INTEMODALITE = "Note Intemodalité";
    const NOTE_LETTRE = "Note Lettre";

    const FILE_CSV = 'Bilan mandat (avec retour mairies) - 3 - Intermodalité.csv';

    public function __construct(
        public bool $pVVelostationsProjetees,
        public bool $pVAbriVelo,
        public bool $metstation,
        public float $noteIntermodalite,
        public ?int $gareVeloStationAvecIntentions = null,
        public ?int $gareAbrisVelo = null,
        public ?int $gareArceaux = null,
        public ?string $lettreNote = null,
    )
    {
    }

    public static function getCSVFile(): string
    {
        return self::FILE_CSV;
    }
}