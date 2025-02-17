<?php

namespace App\Service;

use App\Model\BilanActionsMairieCity;
use App\Model\BilanAmenagementCity;
use App\Model\BilanCity;
use App\Model\BilanGenerationVeloCity;
use App\Model\BilanGlobalCity;
use App\Model\BilanIntermodaliteCity;
use App\Model\BilanReVECity;
use App\Model\BilanVilleApaiseeCity;

class BilanCityGenerator
{
    public function loadBilanCity(string $city): BilanCity
    {
        return new BilanCity(
            $city,
            $this->createBilanReVECity(),
            $this->createBilanAmenagementCity(),
            $this->createBilanIntermodaliteCity(),
            $this->createBilanVilleApaiseeCity(),
            $this->createBilanGenerationVeloCity(),
            $this->createBilanActionMairieCity(),
            $this->createBilanGlobalCity(),
        );
    }

    public function createBilanGlobalCity(): BilanGlobalCity
    {
        return new BilanGlobalCity(
            reve: 0.86,
            amenagement: 0.86,
            intermodalite: 0.86,
            villeApaisee: 0.86,
            generationVelo: 0.86,
            autre: 0.86,
            noteGlobaleSansBonus: 0.86,
            noteGlobaleAvecBonus: 0.86,
            noteLetter: 'A',
        );
    }

    public function createBilanGenerationVeloCity(): BilanGenerationVeloCity
    {
        return new BilanGenerationVeloCity(
            nbRuesAuxEnfant: 3,
            nbRuesAuxEnfantFuturs: 1,
            nbEcoles: 5,
            excursion: false,
            pedibusVelobus: false,
            srav: false,
            projetEnCours: true,
            noteGenerationVelo: 0.86,
        );
    }

    public function createBilanIntermodaliteCity(): BilanIntermodaliteCity
    {
        return new BilanIntermodaliteCity(
            pVVelostationsProjetees: false,
            pVAbriVelo: false,
            gareVeloStationAvecIntentions: 0,
            gareAbrisVelo: 0,
            gareArceaux: 1,
            metstation: false,
            noteIntermodalite: 0.86,
        );
    }

    public function createBilanReVECity(): BilanReVECity
    {
        return new BilanReVECity(
            nombreDeLigneCorrespondant: 'entièrement',
            dessertePointsInteretMajeur: true,
            desserteCentreVille: true,
            noteProjetReve: 0.75,
            constructionALEtude: true,
            constructionEntierementALEtude: true,
            constructionCommencee: true,
            constructionTerminee: true,
            noteRealisationReVE: 0.86,
            noteGlobalReVE: 0.86
        );
    }

    public function createBilanActionMairieCity(): BilanActionsMairieCity
    {
        return new BilanActionsMairieCity(
            rencontreReguliereAsso: false,
            journeeSensibilisation: false,
            planVelo: false,
            forfaitMobiliteAgent: false,
            pretVeloAgent: false,
            noteActionMairie: 0.86
        );
    }

    public function createBilanVilleApaiseeCity(): BilanVilleApaiseeCity
    {
        return new BilanVilleApaiseeCity(
            nouveauxSecteursCircuRestreinte: false,
            planDeCirculation: false,
            reductionStationnementAuto: false,
            villeA30: false,
            arceauxPour1000Hab: 0.86,
            noteVilleApaisee: 0.86,
        );
    }

    public function createBilanAmenagementCity(): BilanAmenagementCity
    {
        return new BilanAmenagementCity(
            noteDebutMandat: 0.86,
            noteFinMandat: 0.86,
            cyclabilite: 0.86,
            evolutionSurLeMandat: 0.86,
            noteAmenagement: 0.86,
        );
    }
}