<?php

namespace App\Controller;

use App\clas\Annonces;
use App\clas\FileHelper;
use App\clas\PushElements;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $services = new FileHelper('services');
        $annonces = new Annonces();

        // var_dump($annonces->getAnnonces());

        return $this->render('home/index.html.twig', [
            "annonces" => $annonces->getAnnonces()
        ]);
    }
}
