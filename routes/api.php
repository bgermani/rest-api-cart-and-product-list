<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// Products
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'store', 'update', 'destroy']]);

// Orders
Route::resource('orders', 'Order\OrderController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

// Order details
Route::resource('order_details', 'Order_Detail\Order_DetailController', ['only' => ['index', 'store', 'update', 'destroy']]);

// Users
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);