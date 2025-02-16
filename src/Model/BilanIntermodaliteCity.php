<?php

namespace App\Model;

class BilanIntermodaliteCity
{
    public function __construct(
        public bool $pVVelostationsProjetees,
        public bool $pVAbriVelo,
        public ?bool $gareVeloStationAvecIntentions = null,
        public ?bool $gareAbrisVelo = null,
        public bool $gareArceaux,
        public bool $metstation,
        public float $noteIntermodalite,
    )
    {
    }
}