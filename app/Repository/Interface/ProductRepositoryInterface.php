<?php

namespace App\Repository\Interface;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function decrease(Product $product): bool;
}
