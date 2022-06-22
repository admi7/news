<?php

namespace App\Controller;

use App\clas\FileHelper;
use App\clas\PushElements;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipeController extends AbstractController
{
    #[Route('/equipe/', name: 'app_equipe')]
    public function index(Request $request): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);

        $membre = new FileHelper('equipe');
        // var_dump($membre);
        return $this->render('equipe/index.html.twig', [
            "membres" => $membre->getElementToJson()
        ]);
    }

    #[Route('/equipe/{membre}', name: 'app_membre')]
    public function membre(Request $request, string $membre): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);
        $membrePersonnel = new FileHelper('equipe');
        return $this->render('equipe/membre.html.twig', [
            "membrePersonnel" => $membrePersonnel->treeElementBySlug($membre),
            "membre" => $membre
        ]);
    }
}
