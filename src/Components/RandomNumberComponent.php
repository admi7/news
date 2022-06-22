<?php

// src/Components/RandomNumberComponent.php
namespace App\Components;


use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
// use Symfony\UX\LiveComponent\DefaultActionTrait;
// use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsLiveComponent('random_number')]

class RandomNumberComponent
{
    #[LiveProp]
    public int $min = 0;

    #[LiveProp]
    public int $max = 1000;

    public function __invoke()
    {
    }
    public function getRandomNumber(): int
    {
        return rand($this->min, $this->max);
    }

    // ...
}
