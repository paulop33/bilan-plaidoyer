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
use App\Service\BilanCityGenerator;
use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilanController extends AbstractController
{

    public function __construct(private readonly BilanCityGenerator $bilanCityGenerator)
    {
    }

    #[Route('/bilan', name: 'app_bilan_final')]
    public function bilan(): Response
    {
        return $this->render('bilan/index.html.twig', [
            'data' => $this->bilanCityGenerator->loadBilanCity('Bordeaux'),
        ]);
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
}
