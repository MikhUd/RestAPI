<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/get-token', [\App\Http\Controllers\Auth\AuthController::class, 'getToken']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('/product-review', \App\Http\Controllers\ProductReviewController::class)->only(['store', 'update', 'destroy']);
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'getProductListHavingUserReview']);
});

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'getProductWithRating']);
Route::get('/products/{min_rating}/{order_by}', [\App\Http\Controllers\ProductController::class, 'getProductListByFilter']);

