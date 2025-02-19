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
        $file = 'Bilan mandat (avec retour mairies) - Bilan global.csv';
        $data = $this->loadInfosInFile($file, $city);

        return new BilanGlobalCity(
            reve: floatval(str_replace(',', '.', $data[BilanGlobalCity::REVE])),
            amenagement: floatval(str_replace(',', '.', $data[BilanGlobalCity::AMENAGEMENTS])),
            intermodalite: floatval(str_replace(',', '.', $data[BilanGlobalCity::INTERMODALITE])),
            villeApaisee: floatval(str_replace(',', '.', $data[BilanGlobalCity::VILLE_APAISEE])),
            generationVelo: floatval(str_replace(',', '.', $data[BilanGlobalCity::GENERATION_VELO])),
            autre: floatval(str_replace(',', '.', $data[BilanGlobalCity::AUTRES])),
            noteGlobaleSansBonus: floatval(str_replace(',', '.', $data[BilanGlobalCity::NOTE_GLOBALE_SANS_BONUS])),
            noteGlobaleAvecBonus: floatval(str_replace(',', '.', $data[BilanGlobalCity::NOTE_GLOBALE_AVEC_BONUS])),
            noteLetter: $data[BilanGlobalCity::NOTE],
        );
    }

    public function createBilanGenerationVeloCity(string $city): BilanGenerationVeloCity
    {
        $file = 'Bilan mandat (avec retour mairies) - 5 - Génération vélo.csv';
        $data = $this->loadInfosInFile($file, $city);
        return new BilanGenerationVeloCity(
            nbRuesAuxEnfant: (int)$data[BilanGenerationVeloCity::NBRUESAUXENFANT],
            nbRuesAuxEnfantFuturs: (int)$data[BilanGenerationVeloCity::NBRUESAUXENFANTFUTURS],
            nbEcoles: (int)$data[BilanGenerationVeloCity::NBECOLES],
            excursion: (bool)$data[BilanGenerationVeloCity::EXCURSION],
            pedibusVelobus: (bool)$data[BilanGenerationVeloCity::PEDIBUSVELOBUS],
            srav: (bool)$data[BilanGenerationVeloCity::SRAV],
            projetEnCours: (bool)$data[BilanGenerationVeloCity::PROJETENCOURS],
            noteGenerationVelo: (float)$data[BilanGenerationVeloCity::NOTEGENERATIONVELO],
        );
    }

    public function createBilanIntermodaliteCity($city): BilanIntermodaliteCity
    {
        $file = 'Bilan mandat (avec retour mairies) - 3 - Intermodalité.csv';
        $data = $this->loadInfosInFile($file, $city);

        return new BilanIntermodaliteCity(
            pVVelostationsProjetees: (bool)$data[BilanIntermodaliteCity::P_V_VELOSTATIONS_PROJETEES],
            pVAbriVelo: (bool)$data[BilanIntermodaliteCity::P_V_ABRI_VELO],
            gareVeloStationAvecIntentions: (int)$data[BilanIntermodaliteCity::GARE_VELO_STATION_AVEC_INTENTIONS],
            gareAbrisVelo: (int)$data[BilanIntermodaliteCity::GARE_ABRIS_VELO],
            gareArceaux: (int)$data[BilanIntermodaliteCity::GARE_ARCEAUX],
            metstation: (bool)$data[BilanIntermodaliteCity::METSTATION],
            noteIntermodalite: floatval(str_replace(',', '.', $data[BilanIntermodaliteCity::NOTE_INTEMODALITE])),
        );
    }

    public function createBilanReVECity(string $city): BilanReVECity
    {
        $file = 'Bilan mandat (avec retour mairies) - 1 - ReVE.csv';
        $data = $this->loadInfosInFile($file, $city, true);

        return new BilanReVECity(
            nombreDeLigneCorrespondant: (string)$data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITENOMBRE_DE_LIGNE_ITINERAIRE_CORRESPONDANT_AUX_ATTENTES],
            dessertePointsInteretMajeur: (bool)$data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_POINTS_DINTERET_MAJEUR_GARE_ETC],
            desserteCentreVille: (bool)$data[BilanReVECity::CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_CENTRE_VILLE],
            noteProjetReve: floatval(str_replace(',', '.', $data[BilanReVECity::NOTE_PROJET_REVE])),
            constructionALEtude: (bool)$data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEALETUDE],
            constructionEntierementALEtude: (bool)$data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEENTIEREMENTALETUDE],
            constructionCommencee: (bool)$data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVECOMMENCEE],
            constructionTerminee: (bool)$data[BilanReVECity::ACTIONS_POUR_LA_CONSTRUCTION_DU_REVETERMINEE],
            noteRealisationReVE: floatval(str_replace(',', '.', $data[BilanReVECity::NOTE_REALISATION_REVE])),
            noteGlobalReVE: floatval(str_replace(',', '.', $data[BilanReVECity::NOTE_GLOBALE_REVE])),
        );
    }

    public function createBilanActionMairieCity($city): BilanActionsMairieCity
    {
        $file = 'Bilan mandat (avec retour mairies) - Actions mairies.csv';
        $data = $this->loadInfosInFile($file, $city);

        return new BilanActionsMairieCity(
            rencontreReguliereAsso: (bool)$data[BilanActionsMairieCity::RENCONTRE_REGULIERE_ASSO],
            journeeSensibilisation: (bool)$data[BilanActionsMairieCity::JOURNEE_SENSIBILISATION],
            planVelo: (bool)$data[BilanActionsMairieCity::PLAN_VELO],
            forfaitMobiliteAgent: (bool)$data[BilanActionsMairieCity::FORFAIT_MOBILITE_AGENT],
            pretVeloAgent: (bool)$data[BilanActionsMairieCity::PRET_VELO_AGENT],
            noteActionMairie: floatval(str_replace(',', '.', $data[BilanActionsMairieCity::NOTE_ACTIONS_MAIRIES])),
        );
    }

    public function createBilanVilleApaiseeCity($city): BilanVilleApaiseeCity
    {
        $file = 'Bilan mandat (avec retour mairies) - 4 - Ville apaisée.csv';
        $data = $this->loadInfosInFile($file, $city);

        return new BilanVilleApaiseeCity(
            nouveauxSecteursCircuRestreinte: (bool)$data[BilanVilleApaiseeCity::FIELD_NOUVEAUXSECTEURSCIRCURESTREINTE],
            planDeCirculation: (bool)$data[BilanVilleApaiseeCity::FIELD_PLANDECIRCULATION],
            reductionStationnementAuto: (bool)$data[BilanVilleApaiseeCity::FIELD_REDUCTIONSTATIONNEMENTAUTO],
            villeA30: (bool)$data[BilanVilleApaiseeCity::FIELD_VILLEA30],
            arceauxPour1000Hab: floatval(str_replace(',', '.', $data[BilanVilleApaiseeCity::FIELD_ARCEAUXPOUR1000HAB])),
            noteVilleApaisee: floatval(str_replace(',', '.', $data[BilanVilleApaiseeCity::FIELD_NOTEVILLEAPAISEE])),
        );
    }

    public function createBilanAmenagementCity($city): BilanAmenagementCity
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
}