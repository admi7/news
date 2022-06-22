<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('service')]
class ServiceComponent
{
    public array $service;

    public function __construct()
    {
    }
}

#[AsTwigComponent('services')]
class ServicesComponent
{
    public array $services;

    public function __construct()
    {
    }

    public function getServices()
    {
        dd($this->services);
    }
}
