<?php

namespace App\Repository\Interface;

use App\Models\Order;
use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function create(Order $order, array $data): Transaction;
}
