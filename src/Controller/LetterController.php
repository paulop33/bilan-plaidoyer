<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LetterController extends AbstractController
{
    #[Route('/', name: 'app_letter')]
    public function index(): Response
    {
        return $this->render('letter/index.html.twig', [
            'data' => [
                'genre' => 0,
                'dateExtract' => new \DateTime('2024-03-01'),
                'hasGare' => true,
                'hasBoulevard' => true,
            ]
        ]);
    }
}
