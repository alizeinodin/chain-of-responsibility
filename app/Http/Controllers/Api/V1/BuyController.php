<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Enum\OrderStatus;
use App\Http\Enum\TransactionStatus;
use App\Jobs\SendSMS;
use App\Models\Product;
use App\Repository\Class\OrderRepository;
use App\Repository\Class\ProductRepository;
use App\Repository\Class\TransactionRepository;
use App\Repository\Class\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuyController extends Controller
{
    public function __construct(
        private readonly UserRepository        $userRepository,
        private readonly TransactionRepository $transactionRepository,
        private readonly OrderRepository       $orderRepository,
        private readonly ProductRepository     $productRepository,
    )
    {
    }

    public function buy(Request $request, Product $product)
    {
        $order = $this->orderRepository->create($request->user());

        $this->orderRepository->addProduct($order, $product);

        $transaction = $this->transactionRepository->create($order, [
            'amount' => $product->cost,
            'status' => TransactionStatus::ACCEPTED,
        ]);

        $this->orderRepository->updateStatus($order, OrderStatus::PROCESSING);
        $this->orderRepository->addTransaction($order, $transaction);

        $this->productRepository->decrease($product);

        $this->userRepository->decreaseCredit(\request()->user(), $product->cost);

        dispatch(new SendSMS($request->user()->phone));

        return response()
            ->json([
                'message' => 'Thank you for buying',
                'order' => $order,
            ]);
    }
}
