<?php

namespace App\Model;

class BilanActionsMairieCity
{
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