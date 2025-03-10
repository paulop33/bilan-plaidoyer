<?php

namespace App\Service;

use App\Model\AveragesBilan;
use App\Model\BilanActionsMairieCity;
use App\Model\BilanAmenagementCity;
use App\Model\BilanCity;
use App\Model\BilanGenerationVeloCity;
use App\Model\BilanGlobalCity;
use App\Model\BilanIntermodaliteCity;
use App\Model\BilanReVECity;
use App\Model\BilanVilleApaiseeCity;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class BilanCityGenerator
{
    const VILLE_FIELD_CSV = 'Ville';

    public function __construct(
        #[Autowire('%kernel.project_dir%')] private string $kernelProjectDir,
    ) {
    }

    public function loadBilanCity(string $city): BilanCity
    {
        return new BilanCity(
            $city,
            $this->createBilanReVECity($city),
            $this->createBilanAmenagementCity($city),
            $this->createBilanIntermodaliteCity($city),
            $this->createBilanVilleApaiseeCity($city),
            $this->createBilanGenerationVeloCity($city),
            $this->createBilanActionMairieCity($city),
            $this->createBilanGlobalCity($city),
        );
    }

    public function createBilanGlobalCity(string $city): BilanGlobalCity
    {
        $data = $this->loadInfosInFile(BilanGlobalCity::getCSVFile(), $city);

        return new BilanGlobalCity(
            reve: $this->getFloatval($data[BilanGlobalCity::REVE]),
            amenagement: $this->getFloatval($data[BilanGlobalCity::AMENAGEMENTS]),
            intermodalite: $this->getFloatval($data[BilanGlobalCity::INTERMODALITE]),
            villeApaisee: $this->getFloatval($data[BilanGlobalCity::VILLE_APAISEE]),
            generationVelo: $this->getFloatval($data[BilanGlobalCity::GENERATION_VELO]),
            autre: $this->getFloatval($data[BilanGlobalCity::AUTRES]),
            noteGlobaleSansBonus: $this->getFloatval($data[BilanGlobalCity::NOTE_GLOBALE_SANS_BONUS]),
            noteGlobaleAvecBonus: $this->getFloatval($data[BilanGlobalCity::NOTE_GLOBALE_AVEC_BONUS]),
            noteLetter: $data[BilanGlobalCity::NOTE],
        );
    }

    public function createBilanGenerationVeloCity(string $city): BilanGenerationVeloCity
    {
        $data = $this->loadInfosInFile(BilanGenerationVeloCity::getCSVFile(), $city);
        return new BilanGenerationVeloCity(
            nbRuesAuxEnfant: (int)$data[BilanGenerationVeloCity::NBRUESAUXENFANT],
            nbRuesAuxEnfantFuturs: (int)$data[BilanGenerationVeloCity::NBRUESAUXENFANTFUTURS],
            nbEcoles: (int)$data[BilanGenerationVeloCity::NBECOLES],
            pedibusVelobus: $this->getBool($data[BilanGenerationVeloCity::PEDIBUSVELOBUS]),
            srav: $this->getBool($data[BilanGenerationVeloCity::SRAV]),
            noteGenerationVelo: $this->getFloatval($data[BilanGenerationVeloCity::NOTEGENERATIONVELO]),
            excursion: $this->getBool($data[BilanGenerationVeloCity::EXCURSION]),
            projetEnCours: $this->getBool($data[BilanGenerationVeloCity::PROJETENCOURS]),
        );
    }

    public function createBilanIntermodaliteCity($city): BilanIntermodaliteCity
    {
        $data = $this->loadInfosInFile(BilanIntermodaliteCity::getCSVFile(), $city);

        return new BilanIntermodaliteCity(
            pVVelostationsProjetees: $this->getBool($data[BilanIntermodaliteCity::P_V_VELOSTATIONS_PROJETEES]),
            pVAbriVelo: $this->getBool($data[BilanIntermodaliteCity::P_V_ABRI_VELO]),
            metstation: $this->getBool($data[BilanIntermodaliteCity::METSTATION]),
            noteIntermodalite: $this->getFloatval($data[BilanIntermodaliteCity::NOTE_INTEMODALITE]),
            gareVeloStationAvecIntentions: (int)$data[BilanIntermodaliteCity::GARE_VELO_STATION_AVEC_INTENTIONS],
            gareAbrisVelo: (int)$data[BilanIntermodaliteCity::GARE_ABRIS_VELO],
            gareArceaux: (int)$data[BilanIntermodaliteCity::GARE_ARCEAUX],
        );
    }

    public function createBilanReVECity(string $city): BilanReVECity
    {
        $data = $this->loadInfosInFile(BilanReVECity::getCSVFile(), $city, true);

        return new BilanReVECity(
            nombreDeLigneCorrespondant: (string)$data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITENOMBRE_DE_LIGNE_ITINERAIRE_CORRESPONDANT_AUX_ATTENTES],
            dessertePointsInteretMajeur: $this->getBool($data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_POINTS_DINTERET_MAJEUR_GARE_ETC]),
            desserteCentreVille: $this->getBool($data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_CENTRE_VILLE]),
            constructionALEtude: $this->getBool($data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEALETUDE]),
            constructionEntierementALEtude: $this->getBool($data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEENTIEREMENTALETUDE]),
            constructionCommencee: $this->getBool($data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVECOMMENCEE]),
            constructionTerminee: $this->getBool($data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVETERMINEE]),
            noteGlobalReVE: $this->getFloatval($data[BilanReVECity::NOTE_GLOBALE_REVE]),
            noteProjetReve: $this->getFloatval($data[BilanReVECity::NOTE_PROJET_REVE]),
            noteRealisationReVE: $this->getFloatval($data[BilanReVECity::NOTE_REALISATION_REVE]),
        );
    }

    public function createBilanActionMairieCity($city): BilanActionsMairieCity
    {
        $data = $this->loadInfosInFile(BilanActionsMairieCity::getCSVFile(), $city);

        return new BilanActionsMairieCity(
            rencontreReguliereAsso: $this->getBool($data[BilanActionsMairieCity::RENCONTRE_REGULIERE_ASSO]),
            journeeSensibilisation: $this->getBool($data[BilanActionsMairieCity::JOURNEE_SENSIBILISATION]),
            planVelo: $this->getBool($data[BilanActionsMairieCity::PLAN_VELO]),
            forfaitMobiliteAgent: $this->getBool($data[BilanActionsMairieCity::FORFAIT_MOBILITE_AGENT]),
            pretVeloAgent: $this->getBool($data[BilanActionsMairieCity::PRET_VELO_AGENT]),
            noteActionMairie: $this->getFloatval($data[BilanActionsMairieCity::NOTE_ACTIONS_MAIRIES]),
        );
    }

    public function createBilanVilleApaiseeCity($city): BilanVilleApaiseeCity
    {
        $data = $this->loadInfosInFile(BilanVilleApaiseeCity::getCSVFile(), $city);

        return new BilanVilleApaiseeCity(
            nouveauxSecteursCircuRestreinte: $this->getBool($data[BilanVilleApaiseeCity::FIELD_NOUVEAUXSECTEURSCIRCURESTREINTE]),
            planDeCirculation: $this->getBool($data[BilanVilleApaiseeCity::FIELD_PLANDECIRCULATION]),
            reductionStationnementAuto: $this->getBool($data[BilanVilleApaiseeCity::FIELD_REDUCTIONSTATIONNEMENTAUTO]),
            villeA30: $this->getBool($data[BilanVilleApaiseeCity::FIELD_VILLEA30]),
            arceauxPour1000Hab: $this->getFloatval($data[BilanVilleApaiseeCity::FIELD_ARCEAUXPOUR1000HAB]),
            noteVilleApaisee: $this->getFloatval($data[BilanVilleApaiseeCity::FIELD_NOTEVILLEAPAISEE]),
        );
    }

    public function createBilanAmenagementCity($city): BilanAmenagementCity
    {
        $data = $this->loadInfosInFile(BilanAmenagementCity::getCSVFile(), $city);

        return new BilanAmenagementCity(
            noteDebutMandat: $this->getFloatval($data[BilanAmenagementCity::FIELD_NOTEDEBUTMANDAT]),
            noteFinMandat: $this->getFloatval($data[BilanAmenagementCity::FIELD_NOTEFINMANDAT]),
            cyclabilite: $this->getFloatval($data[BilanAmenagementCity::FIELD_CYCLABILITE]),
            evolutionSurLeMandat: $this->getFloatval($data[BilanAmenagementCity::FIELD_EVOLUTIONSURLEMANDAT]),
            noteAmenagement: $this->getFloatval($data[BilanAmenagementCity::FIELD_NOTEAMENAGEMENT]),
        );
    }

    /**
     * @throws \Exception
     */
    private function loadInfosInFile(string $file, string $city, $combineTwoRowsHeader = false): array
    {
        $filename = $this->kernelProjectDir.'/csv-bilan/'.$file;
        if (!file_exists($filename)) {
            throw new \Exception("File $filename does not exist");
        }

        $resource = fopen($filename, 'r');
        $header = fgetcsv($resource);
        if ($combineTwoRowsHeader) {
            $header2 = fgetcsv($resource);
            for ($i = 0; $i < count($header2); $i++) {
                if ($header[$i]) {
                    $lastHeader1 = $header[$i];
                }
                $header2[$i] = $lastHeader1 . ($header2[$i] ?? '');
            }
            $header = $header2;
        }
        $dataBareme = fgetcsv($resource);

        while (($data = fgetcsv($resource)) !== FALSE) {
            $dataCity = array_combine($header, $data);
            if ($city === $dataCity[self::VILLE_FIELD_CSV]) {
                return $dataCity;
            }
        }
        throw new \Exception("City $city does not exist in $file");
    }

    public function getFloatval($data): ?float
    {
        if ($data === null || $data === '' || $data === 'NC') {
            return null;
        }
        return floatval(str_replace(',', '.', $data));
    }

    private function getBool($data): ?bool
    {
        if ($data === null || $data === '' || $data === 'NC') {
            return null;
        }
        return $data === 'oui';
    }

    public function getAverages(): AveragesBilan
    {
        $data = $this->loadAverageInFile(AveragesBilan::getCSVFile());
        return new AveragesBilan(
            averageBilanReVE: $this->getFloatval($data[BilanGlobalCity::REVE]),
            averageBilanAmenagement: $this->getFloatval($data[BilanGlobalCity::AMENAGEMENTS]),
            averageBilanIntermodalite: $this->getFloatval($data[BilanGlobalCity::INTERMODALITE]),
            averageBilanVilleApaisee: $this->getFloatval($data[BilanGlobalCity::VILLE_APAISEE]),
            averageBilanGenerationVelo: $this->getFloatval($data[BilanGlobalCity::GENERATION_VELO]),
            averageBilanActionsMairie: $this->getFloatval($data[BilanGlobalCity::AUTRES]),
            averageBilanGlobal: $this->getFloatval($data[BilanGlobalCity::NOTE_GLOBALE_AVEC_BONUS]),
        );
    }

    private function loadAverageInFile(string $file): array
    {
        $filename = $this->kernelProjectDir.'/csv-bilan/'.$file;
        if (!file_exists($filename)) {
            throw new \Exception("File $filename does not exist");
        }

        $resource = fopen($filename, 'r');
        $header = fgetcsv($resource);
        $header2 = fgetcsv($resource);
//        for ($i = 0; $i < count($header2); $i++) {
//            if ($header[$i]) {
//                $lastHeader1 = $header[$i];
//            }
//            $header2[$i] = $lastHeader1 . ($header2[$i] ?? '');
//        }
//        $header = $header2;
        $dataBareme = fgetcsv($resource);

        while (($data = fgetcsv($resource)) !== FALSE) {
            $dataCity = array_combine($header, $data);
            if ('Moyenne' === $dataCity[self::VILLE_FIELD_CSV]) {
                return $dataCity;
            }
        }
        return [];
    }
}