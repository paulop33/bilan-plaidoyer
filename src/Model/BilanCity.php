<?php

namespace App\Model;

class BilanCity
{

    public function __construct(
        public string                  $city,
        public BilanReVECity           $bilanReVE,
        public BilanAmenagementCity    $bilanAmenagement,
        public BilanIntermodaliteCity  $bilanIntermodalite,
        public BilanVilleApaiseeCity   $bilanVilleApaisee,
        public BilanGenerationVeloCity $bilanGenerationVelo,
        public BilanActionsMairieCity  $bilanActionsMairie,
        public BilanGlobalCity         $bilanGlobal
    )
    {
    }
}