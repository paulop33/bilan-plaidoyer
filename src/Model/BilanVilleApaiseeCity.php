<?php

namespace App\Model;

class BilanVilleApaiseeCity
{
    public function __construct(
        public bool $nouveauxSecteursCircuRestreinte,
        public bool $planDeCirculation,
        public bool $reductionStationnementAuto,
        public bool $villeA30,
        public float $arceauxPour1000Hab,
        public float $noteVilleApaisee
    )
    {
    }
}