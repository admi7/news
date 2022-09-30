<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjaxController extends AbstractController
{
    #[Route('send:ajax/{data}')]
    public function index(Request $request, string $data): Response
    {
        return $this->render('ajax/index.html.twig', [
            "data" => $data
        ]);
    }
}
