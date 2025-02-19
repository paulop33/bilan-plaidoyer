<?php

namespace App\Model;

class BilanActionsMairieCity
{
    const RENCONTRE_REGULIERE_ASSO = "rencontre régulière asso";
    const JOURNEE_SENSIBILISATION = "journée sensibilisation";
    const PLAN_VELO = "plan vélo";
    const FORFAIT_MOBILITE_AGENT = "forfait mobilité agent";
    const PRET_VELO_AGENT = "pret vélo agent";
    const NOTE_ACTIONS_MAIRIES = "Note actions mairies";

    public function __construct(
        public bool $rencontreReguliereAsso,
        public bool $journeeSensibilisation,
        public bool $planVelo,
        public bool $forfaitMobiliteAgent,
        public bool $pretVeloAgent,
        public float $noteActionMairie,
    )
    {
    }
}