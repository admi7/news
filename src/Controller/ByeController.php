<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ByeController extends AbstractController
{
    #[Route('/bye', name: 'app_bye')]
    public function index(): Response
    {
        return $this->render('bye/index.html.twig', [
            'controller_name' => 'ByeController',
        ]);
    }
}
