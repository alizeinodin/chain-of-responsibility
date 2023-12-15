<?php

namespace App\Repository\Class;

use App\Models\Product;
use App\Repository\Interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function decrease(Product $product): bool
    {
        $product->number--;
        return $product->save();
    }
}
