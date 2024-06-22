<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomersController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register/index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard/index');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('orders', OrderController::class);
Route::resource('products', ProductController::class);
Route::resource('prices', PricesController::class);
Route::resource('customers', CustomersController::class);