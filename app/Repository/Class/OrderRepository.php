<?php

namespace App\Repository\Class;

use App\Http\Enum\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Repository\Interface\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function create(User $user): Order
    {
        $order = new Order;
        $user
            ->orders()
            ->save($order);

        $order->refresh();
        return $order;
    }

    public function addProduct(Order $order, Product $product): Product|bool
    {
        return $order
            ->products()
            ->save($product);
    }

    public function updateStatus(Order $order, OrderStatus $status): bool
    {
        $order->status = $status;
        return $order->save();
    }

    public function addTransaction(Order $order, Transaction $transaction): Transaction|bool
    {
        return $order->transactions()
            ->save($transaction);
    }
}
