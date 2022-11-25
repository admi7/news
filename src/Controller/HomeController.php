<?php

namespace App\Controller;

use App\clas\FileHelper;
use App\clas\PushElements;
use Symfony\Component\WebLink\Link;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\WebLink\GenericLinkProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        // using the addLink() shortcut provided by AbstractController
        $this->addLink($request, new Link('preload', '/app.css'));

        // alternative if you don't want to use the addLink() shortcut
        $linkProvider = $request->attributes->get('_links', new GenericLinkProvider());
        $request->attributes->set('_links', $linkProvider->withLink(
            (new Link('preload', '/app.css'))->withAttribute('as', 'style')
        ));
        $pushElements = new PushElements();
        $pushElements->session($request);

        $fileHelper = new FileHelper('services');

        return $this->render('home/index.html.twig', [
            "services" => $fileHelper->getServicesLimited($fileHelper->getElementToJson(), 2, 10)['shows'],
            // "data" => ["name", "Meta"]
        ]);
    }

    #[Route('/home:post:{data}')]
    public function homePost(Request $request, string $data)
    {
        // return $this->json(['data' => 'value'], 200);
        return $this->redirectToRoute('app_home', [
            "data" => $_POST['data']
        ], 301);
    }
}
