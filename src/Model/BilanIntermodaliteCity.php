<?php

namespace App\Model;

class BilanIntermodaliteCity
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

    public function __construct(
        public bool $pVVelostationsProjetees,
        public bool $pVAbriVelo,
        public ?int $gareVeloStationAvecIntentions = null,
        public ?int $gareAbrisVelo = null,
        public ?int $gareArceaux = null,
        public bool $metstation,
        public float $noteIntermodalite,
    )
    {
    }
}