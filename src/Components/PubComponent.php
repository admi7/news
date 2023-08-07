<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Pub')]
class PubComponent
{
    public array $images;
    public string $links;
}
