<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PriceController;
use App\Http\Controllers\API\AuthController;

Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::patch('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

Route::get('customer', [CustomerController::class, 'index']);
Route::post('customer', [CustomerController::class, 'store']);
Route::patch('customer/{id}', [CustomerController::class, 'update']);
Route::delete('customer/{id}', [CustomerController::class, 'destroy']);

Route::get('order', [OrderController::class, 'index']);
Route::post('order', [OrderController::class, 'store']);
Route::patch('order/{id}', [OrderController::class, 'update']);
Route::delete('order/{id}', [OrderController::class, 'destroy']);

Route::get('price', [PriceController::class, 'index']);
Route::post('price', [PriceController::class, 'store']);
Route::patch('price/{id}', [PriceController::class, 'update']);
Route::delete('price/{id}', [PriceController::class, 'destroy']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
