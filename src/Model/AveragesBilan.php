<?php

namespace App\Model;

class AveragesBilan implements FromCSVFile
{
    public function __construct(
        public float $averageBilanReVE,
        public float $averageBilanAmenagement,
        public float $averageBilanIntermodalite,
        public float $averageBilanVilleApaisee,
        public float $averageBilanGenerationVelo,
        public float $averageBilanActionsMairie,
        public float $averageBilanGlobal,
    )
    {
    }

    public static function getCSVFile(): string
    {
        return BilanGlobalCity::FILE_CSV;
    }
}