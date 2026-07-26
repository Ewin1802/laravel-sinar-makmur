<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Public Routes
|
*/

Route::get('/', [LandingController::class, 'index'])
    ->name('landing');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::middleware('role:admin')
        ->group(function () {

            Route::resource('users', UserController::class)
                ->except('show');
            Route::resource('categories', CategoryController::class)
                ->except('show');
            Route::resource('products', ProductController::class)
                ->except('show');
            Route::resource('discounts', DiscountController::class)
                ->except('show');
            /*
            |--------------------------------------------------------------------------
            | Order Report
            |--------------------------------------------------------------------------
            */

            Route::get('/orders', [OrderController::class, 'index'])
                ->name('orders.index');

            Route::get('/orders/summary', [OrderController::class, 'summary'])
                ->name('orders.summary');

            Route::get('/orders/{id}', [OrderController::class, 'show'])
                ->name('orders.show');

        });

});
