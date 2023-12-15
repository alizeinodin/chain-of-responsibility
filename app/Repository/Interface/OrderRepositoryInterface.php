<?php

namespace App\Repository\Interface;

use App\Http\Enum\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;

interface OrderRepositoryInterface
{
    public function create(User $user): Order;

    public function addProduct(Order $order, Product $product): Product|bool;

    public function addTransaction(Order $order, Transaction $transaction): Transaction|bool;

    public function updateStatus(Order $order, OrderStatus $status): bool;
}
