<?php

namespace App\Components;

use App\Repository\BlogRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('block')]
class BlockComponent
{
    public array $service;
    public string $domaine;

    public function __construct(
        private BlogRepository $blogRepository,
        array $service = [],
        string $domaine = 'blog'
    ) {
        $this->service = $service;
        $this->domaine = $domaine;
    }

    public function getAllBlock(): array
    {
        return $this->blogRepository->findAll();
    }
}
