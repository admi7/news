<?php

namespace App\Components;

use App\Repository\BlogRepository;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('count_blogpost')]
class CountBlogpostComponent
{
    use DefaultActionTrait;

    public function __construct(
        private BlogRepository $blogRepository
    ) {
    }

    public function getAllBlogpost(): int
    {
        return $this->blogRepository->count([]);
    }
}
