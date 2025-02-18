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
use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class BilanCityGenerator
{
    const VILLE_FIELD_CSV = 'Ville';

    public function __construct(
        #[Autowire('%kernel.project_dir%')] private string $kernelProjectDir,
    )
    {

    }
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
            $this->createBilanGlobalCity($city),
        );
    }

    public function createBilanGlobalCity(string $city): BilanGlobalCity
    {
        $file = 'Bilan mandat (avec retour mairies) - Bilan global.csv';
        $data = $this->loadInfosInFile($file, $city);

        return new BilanGlobalCity(
            reve: (float)$data[BilanGlobalCity::REVE],
            amenagement: (float)$data[BilanGlobalCity::AMENAGEMENTS],
            intermodalite: (float)$data[BilanGlobalCity::INTERMODALITE],
            villeApaisee: (float)$data[BilanGlobalCity::VILLE_APAISEE],
            generationVelo: (float)$data[BilanGlobalCity::GENERATION_VELO],
            autre: (float)$data[BilanGlobalCity::AUTRES],
            noteGlobaleSansBonus: (float)$data[BilanGlobalCity::NOTE_GLOBALE_SANS_BONUS],
            noteGlobaleAvecBonus: (float)$data[BilanGlobalCity::NOTE_GLOBALE_AVEC_BONUS],
            noteLetter: $data[BilanGlobalCity::NOTE],
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

    /**
     * @throws \Exception
     */
    private function loadInfosInFile(string $file, string $city): array
    {
        $filename = $this->kernelProjectDir.'/csv-bilan/'.$file;
        if (!file_exists($filename)) {
            throw new \Exception('File does not exist');
        }

        $resource = fopen($filename, 'r');
        $header = fgetcsv($resource, null, ';');
        while (($data = fgetcsv($resource, null, ";")) !== FALSE) {
            $dataCity = array_combine($header, $data);
            if ($city === $dataCity[self::VILLE_FIELD_CSV]) {
                return $dataCity;
            }
        }
        throw new \Exception("City $city does not exist in $file");
    }
}