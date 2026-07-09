<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LookupController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\CartApiController;


Route::get('/cart', [CartApiController::class, 'index']);

Route::post('/cart/add', [CartApiController::class, 'store']);

Route::delete('/cart/remove/{id}', [CartApiController::class, 'destroy']);

Route::put('/cart/update/{id}', [CartApiController::class, 'update']);

Route::get('/customers', [CustomerApiController::class, 'index']);

Route::post('/customers/add', [CustomerApiController::class, 'store']);

Route::put('/customers/update/{id}', [CustomerApiController::class, 'update']);

Route::delete('/customers/delete/{id}', [CustomerApiController::class, 'destroy']);


Route::get('/products', [LookupController::class, 'products']);

Route::get('/orders', [LookupController::class, 'orders']);

Route::get('/users', [LookupController::class, 'users']);
