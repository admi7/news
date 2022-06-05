<?php

// src/Components/ProductSearchComponent.php
namespace App\Components;

use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent('product_search')]
class ProductSearchComponent
{
    use DefaultActionTrait;
    public string $query = '';
}
