<?php

namespace App\clas;

use App\clas\SessionHelper;
use Symfony\Component\HttpFoundation\Request;

class PushElements
{
    public function __construct()
    {
    }

    public function session(Request $request)
    {
        $session = new SessionHelper($request);
        return [
            "session" => $session->start($request),
            "visitors" => $session->visitors()
        ];
    }
}
