<?php

namespace App\Controller;

use App\Service\BilanCityGenerator;
use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BilanController extends AbstractController
{

    public function __construct(private readonly BilanCityGenerator $bilanCityGenerator)
    {
    }

    #[Route('/bilan', name: 'app_bilan_final')]
    public function bilan(): Response
    {
        return $this->render('bilan/index.html.twig', [
            'data' => $this->bilanCityGenerator->loadBilanCity('Bègles'),
        ]);
    }
}
