<?php

namespace App\Controller;

use App\Service\BilanCityGenerator;
use App\Service\ListCitiesFromCsv;
use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BilanController extends AbstractController
{

    public function __construct(
        private readonly BilanCityGenerator $bilanCityGenerator,
        private readonly ListCitiesFromCsv $listCitiesFromCsv,
    )
    {
    }

    #[Route('/bilan', name: 'app_bilan_list')]
    public function bilanList(): Response
    {
        return $this->render('bilan/list.html.twig', [
            'cities' => $this->listCitiesFromCsv->getCities(),
        ]);
    }

    #[Route('/bilan/{city}', name: 'app_bilan_final')]
    public function bilan(string $city = 'Bordeaux'): Response
    {
        return $this->render('bilan/index.html.twig', [
            'data' => $this->bilanCityGenerator->loadBilanCity($city),
            'averages' => $this->bilanCityGenerator->getAverages(),
        ]);
    }
}
