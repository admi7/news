<?php

namespace App\Controller;

use App\clas\PushElements;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooterController extends AbstractController
{

    public function index(Request $request): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);
        return $this->render('resource/_footer.html.twig');
    }
}
