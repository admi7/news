<?php

namespace App\Controller;

use App\clas\PushElements;
use App\clas\SessionHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TodoController extends AbstractController
{
    #[Route("/todos/", name: "app_todos")]
    public function index(Request $request): Response
    {
        $pushElements = new PushElements();
        $pushElements->session($request);

        $session = $request->getSession();
        $todos = $session->get('todos');

        if (!$session->has('todos')) {
            $session->set('todos', $todos);
            $this->addFlash('info', "Votre list vien d'entre initialiser.");
        }

        return $this->render('todo/index.html.twig', []);
    }

    #[Route('/todos/add/{name}:{contents}')]
    public function addTodos(Request $request, string $name, string $contents)
    {
        $pushElements = new PushElements();
        $pushElements->session($request);

        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');
            if (isset($todos[$name])) {
                $this->addFlash('error', "Veuillez changer le nom de votre tache !");
            } else {
                $todos[$name] = $contents;
                $session->set('todos', $todos);
                $this->addFlash('success', "Votre tache viens d'etre ajouter dans votre liste !");
            }
        } else {
            $this->addFlash('error', "Opps une Error ...");
        }
        return $this->redirectToRoute('app_todos');
    }
}
