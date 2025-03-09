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

    public function getNoteBarometre2021(): string
    {
        return match ($this->city) {
            'Ambarès-et-Lagrave' => 'F',
            'Ambès'=> '-',
            'Artigues-près-Bordeaux'=> 'D',
            'Bassens'=> 'D',
            'Bègles'=> 'D',
            'Blanquefort'=> 'C',
            'Bordeaux'=> 'D',
            'Bouliac'=> 'D',
            'Bruges'=> 'D',
            'Carbon-Blanc'=> 'E',
            'Cenon'=> 'E',
            'Eysines'=> 'D',
            'Floirac'=> 'E',
            'Gradignan'=> 'C',
            'Le Bouscat'=> 'F',
            'Le Haillan'=> 'D',
            'Le Taillan-Médoc'=> 'E',
            'Lormont'=> 'E',
            'Martignas-sur-Jalle'=> 'D',
            'Mérignac'=> 'D',
            'Parempuyre'=> 'F',
            'Pessac'=> 'D',
            'Saint-Aubin de Médoc'=> 'A',
            'Saint-Louis-de-Montferrand'=> '-',
            'Saint-Médard-en-Jalles'=> 'D',
            'Saint-Vincent-de-Paul'=> '-',
            'Talence'=> 'D',
            'Villenave-d\'Ornon'=> 'F',
        };
    }
}