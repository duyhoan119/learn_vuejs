<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('{id}', [ProductController::class, 'save']);
    Route::get('{id}', [ProductController::class, 'findById']);
    Route::get('{id}/images', [ProductController::class, 'getImages']);
    Route::delete('{id}', [ProductController::class, 'distroy']);
    Route::prefix('{id}/variant')->group(function () {
        Route::get('/', [ProductVariantController::class, 'findByProductId']);
    });
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('{id}', [CategoryController::class, 'save']);
    Route::get('{id}', [CategoryController::class, 'findById']);
    Route::delete('{id}', [CategoryController::class, 'distroy']);
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
});
