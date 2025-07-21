<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LetterPartageController extends AbstractController
{
    #[Route('/partage-resultat', name: 'app_partage_res_letter')]
    public function partageResultatLetter(): Response
    {
        return $this->render('letter/partage.html.twig', [
            'data' => [
                'genre' => 0,
                'lienBilanCommune' => 'https://velo-cite.org/wp-content/uploads/2025/06/bilan-etape-Bordeaux.pdf'
            ]
        ]);
    }
}
