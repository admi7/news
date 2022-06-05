<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavController extends AbstractController
{
    // #[Route('/nav', name: 'app_nav')]
    public function index(): Response
    {
        $nav_items = ["name" => "home", "name" => "services", "name" => "blog"];

        return $this->render('resource/_nav.html.twig', [
            "items" => $nav_items
        ]);
    }
}
