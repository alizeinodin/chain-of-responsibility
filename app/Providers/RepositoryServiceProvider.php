<?php

namespace App\Providers;

use App\Repository\Class\OrderRepository;
use App\Repository\Class\ProductRepository;
use App\Repository\Class\TransactionRepository;
use App\Repository\Class\UserRepository;
use App\Repository\Interface\OrderRepositoryInterface;
use App\Repository\Interface\ProductRepositoryInterface;
use App\Repository\Interface\TransactionRepositoryInterface;
use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
