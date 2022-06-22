<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('filter')]
class FilterComponent
{
    public string $filter;
    public string $class;

    public function __construct()
    {
    }
}
