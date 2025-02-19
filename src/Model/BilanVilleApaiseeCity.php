<?php

namespace App\Model;

class BilanVilleApaiseeCity
{
    const FIELD_NOUVEAUXSECTEURSCIRCURESTREINTE = 'nouveaux secteurs circu restreinte';
    const FIELD_PLANDECIRCULATION = 'plan de circulation';
    const FIELD_REDUCTIONSTATIONNEMENTAUTO = 'réduction nbre place stationnement auto';
    const FIELD_VILLEA30 = 'ville à 30';
    const FIELD_ARCEAUXPOUR1000HAB = 'arceaux par 1000 habitants (fin mandat)';
    const FIELD_NOTEVILLEAPAISEE = 'Note Ville apaisée';
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