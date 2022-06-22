<?php

namespace App\clas;

use Symfony\Component\HttpFoundation\Request;

class SessionHelper
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function start()
    {
        return $this->request->getSession();
    }

    public function get($handler)
    {
        return $this->request->get($handler);
    }

    public function visitors()
    {
        // dd($this->request);
        $session = $this->start();

        if ($session->has('nVisite')) {
            $nVisite = $session->get('nVisite') + 1;
        } else {
            $nVisite = 1;
        }

        $vititors = $session->set('nVisite', $nVisite);
        // var_dump($nVisite);
        return [
            $session->set('nVisite', $nVisite),
            "n" => $nVisite
        ];
    }

    public function verify(string $handler)
    {
        $session = $this->start();
        if ($session->has($handler)) {
            return true;
        }
        return false;
    }

    public function set(string $handler, $values = [])
    {
        $session = $this->start();
        return $session->set($handler, $values);
    }
}
