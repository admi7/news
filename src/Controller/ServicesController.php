<?php

namespace App\Controller;

use App\clas\FileHelper;
use App\clas\PushElements;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    #[Route('/services/', name: 'app_services')]
    public function index(Request $request): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);
        $fileHelper = new FileHelper();

        $allServices = $fileHelper->getServicesLimited($fileHelper->getElementToJson(), 7, 10)['shows'];

        return $this->render('services/index.html.twig', [
            'services' => $allServices,
        ]);
    }

    #[Route('/services/{domaineSearch}q={search}')]
    public function search(Request $request, string $domaineSearch, string $search): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);

        $fileHelper = new FileHelper();

        $results = $fileHelper->getElementToJson();

        return $this->render('services/search.html.twig', [
            'search' => $search,
            'domaineSearch' => $domaineSearch,
            'services' => $results,
        ]);
    }

    #[Route('/services/domaine={service}')]
    public function service(Request $request, $service): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);

        $pushElements = new PushElements();
        $session = $pushElements->session($request);
        $fileHelper = new FileHelper('services');

        return $this->render('services/service.html.twig', [
            "rootService" => $service,
        ]);
    }

    #[Route('/services/domaine={service}&service={detail}')]
    public function detail(Request $request, string $detail, string $service): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);

        $fileHelper = new FileHelper('services');

        return $this->render('services/detail.html.twig', [
            "service" => $service,
        ]);
    }

    #[Route('/services/domaine={domaine}&service={service}')]
    public function singleService(Request $request, string $domaine, string $service): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);

        $fileHelper = new FileHelper('services');

        $services = $fileHelper->treeElementsServices($fileHelper->getElementToJson(), $service);
        return $this->render('services/detail.html.twig', [
            "urlDomaine" => $domaine,
            "urlService" => $service,
        ]);
    }

    #[Route('/services/filter:{filterBy}')]
    public function typeOfService(Request $request, string $typeOfService): Response
    {
        $pushElements = new PushElements();
        $session = $pushElements->session($request);

        $fileHelper = new FileHelper('services');

        $filterBy = [];
        return $this->render('services/filterBy.html.twig', [
            "filterBy" => $filterBy,
        ]);
    }
}
