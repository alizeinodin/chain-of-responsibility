<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Enum\OrderStatus;
use App\Http\Enum\TransactionStatus;
use App\Jobs\SendSMS;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuyController extends Controller
{
    public function buy(Request $request, Product $product)
    {
        if (!($request->user()->credit >= $product->cost)) {
            return response()
                ->json([
                    'message' => 'Not enough credit, please charge it!'
                ], Response::HTTP_FORBIDDEN);
        }

        $order = Order::create([
            'order' => OrderStatus::PENDING,
        ]);

        $order->products()->add($product);

        $transaction = Transaction::create([
            'amount' => $order->getTotalAmount(),
            'order' => TransactionStatus::ACCEPTED,
        ]);

        $order->status = OrderStatus::PROCESSING;
        $order->transactions()->add($transaction);
        $order->save();

        $request->user()->credit -= $order->getTotalAmount();

        dispatch(new SendSMS($request->user()->phone));

        return response()
            ->json([
                'message' => 'Thank you for buying',
                'order' => $order,
            ]);
    }
}
