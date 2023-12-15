<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BuyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('auth.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register')
            ->name('register');

        Route::post('/login', 'login')
            ->name('login');

        Route::middleware('auth:sanctum')
            ->get('/logout', 'logout')
            ->name('logout');
    });
});

Route::name('buy.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(BuyController::class)->group(function () {
            Route::get('/buy/{product}', 'buy')
                ->name('buy')
                ->middleware([
                    'product.exists',
                    'credit.check',
                ]);
        });
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
