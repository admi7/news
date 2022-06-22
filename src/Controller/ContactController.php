<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function getServicesToJson(string $file)
    {
        return \json_decode(file_get_contents($file), true);
    }

    public function treeServices(array $array, $handler)
    {
        foreach ($array as $membre) {
            // var_dump($membre['slug']);
            if ($membre['slug'] === $handler) {
                return $membre;
            } else {
            }
        }
    }

    #[Route('/contact/', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact/domaine={domaine}&sujet={personnel}', name: "app_contact_sujet")]
    public function personnel(string $personnel, string $domaine): Response
    {
        if ($domaine) {
            $file = '../assets/JSON/' . $domaine . '.json';
        }
        $membre = $this->treeServices(
            $this->getServicesToJson($file),
            $personnel
        );
        return $this->render('contact/personnel.html.twig', [
            "personnel" => $personnel,
            "domaine" => $domaine,
            "membre" => $membre
        ]);
    }
}
