<?php

namespace App\Repository\Class;

use App\Models\Order;
use App\Models\Transaction;
use App\Repository\Interface\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function create(Order $order, array $data): Transaction
    {
        $transaction = new Transaction();
        $transaction->amount = $data['amount'];
        $transaction->status = $order['status'];

        $order->transactions()
            ->save($transaction);

        $transaction->refresh();
        return $transaction;
    }
}
