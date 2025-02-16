<?php

namespace App\Controller;

use App\Model\BilanActionsMairieCity;
use App\Model\BilanAmenagementCity;
use App\Model\BilanCity;
use App\Model\BilanGenerationVeloCity;
use App\Model\BilanGlobalCity;
use App\Model\BilanIntermodaliteCity;
use App\Model\BilanReVECity;
use App\Model\BilanVilleApaiseeCity;
use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilanController extends AbstractController
{
    #[Route('/bilan', name: 'app_bilan_final')]
    public function bilan(): Response
    {
        return $this->render('bilan/index.html.twig', [
            'data' => $this->loadBilanCity('Bordeaux'),
        ]);
    }

    private function loadBilanCity(string $city): BilanCity
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

    private function loadFile()
    {
        $file = 'Bilan mandat (avec retour mairies) - 1 - ReVE.csv';
        $filename = $this->getParameter('kernel.project_dir').'/csv-bilan/'.$file;
        if (!file_exists($filename)) {
            throw new \Exception('File does not exist');
        }

        $reader = new ReaderCsv();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($filename);
        $data = $this->createBilanReVECity($spreadsheet);
        dd($data);
    }

    protected function createBilanReVECity(): BilanReVECity
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

    protected function createBilanAmenagementCity(): BilanAmenagementCity
    {
        return new BilanAmenagementCity(
            noteDebutMandat: 0.86,
            noteFinMandat: 0.86,
            cyclabilite: 0.86,
            evolutionSurLeMandat: 0.86,
            noteAmenagement: 0.86,
        );
    }

    protected function createBilanIntermodaliteCity(): BilanIntermodaliteCity
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

    protected function createBilanVilleApaiseeCity(): BilanVilleApaiseeCity
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

    protected function createBilanGenerationVeloCity(): BilanGenerationVeloCity
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

    protected function createBilanActionMairieCity(): BilanActionsMairieCity
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

    protected function createBilanGlobalCity(): BilanGlobalCity
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
}
