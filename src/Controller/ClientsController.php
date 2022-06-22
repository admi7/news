<?php

namespace App\Controller;

use App\clas\FileHelper;
use App\clas\PushElements;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientsController extends AbstractController
{
    #[Route('/clients/', name: 'app_clients')]
    public function index(Request $request): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);

        $clients = new FileHelper('clients');
        $allClients = $clients->getElementToJsonClients(['boutique', 'web']);

        // var_dump($allClients);
        return $this->render('clients/index.html.twig', [
            "clientsShop" => $clients->filterElements($clients->treeElementClients($allClients, 'boutique', 'vip')),
            "clientsWeb" => $clients->filterElements($clients->treeElementClients($allClients, 'web', 'vip')),
            "filter" => null
        ]);
    }

    #[Route('/clients/filter={filter}')]
    public function filter(Request $request, string $filter): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);

        $clients = new FileHelper();
        $allClients = $clients->getElementToJsonClients(['boutique', 'web']);

        $filterUrl = function () use ($clients, $allClients, $filter) {
            if (
                $clients->treeElementClients($allClients, $filter) &&
                count($clients->treeElementClients($allClients, $filter)) >= 1
            ) {
                return true;
            }
            $error = 'ce filtre n\'est pas disponible';
            return $error;
        };

        return $this->render('clients/index.html.twig', [
            "filter" => $filterUrl(),
            "nameFilter" => $filter,
            "clients" => $clients->treeElementClients($allClients, $filter, 'all')
        ]);
    }

    #[Route('/clients/client={client}')]
    public function client(string $client): Response
    {
        return $this->render('clients/client.html.twig', []);
    }
}
