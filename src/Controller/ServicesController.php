<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    #[Route('/services/', name: 'app_services')]
    public function index(): Response
    {
        return $this->render('services/index.html.twig', [
            "service" => null
        ]);
    }


    #[Route('/services/{service}', name: 'app_service')]
    public function service(): Response
    {
        return $this->render('services/service.html.twig', []);
    }


    #[Route('/services/detail/{service}/', name: 'app_service_detail')]
    public function detail(): Response
    {
        return $this->render('services/detail.html.twig', []);
    }
}
