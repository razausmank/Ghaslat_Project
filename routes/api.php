<?php

use App\Http\Controllers\Api\CustomerAuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\ProductsController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [CustomerAuthController::class, 'register']);
Route::post('/login', [CustomerAuthController::class, 'login']);


// get products list
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/packages', [PackageController::class, 'index']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order/{id}', [OrderController::class, 'show']);
    Route::get('/orders', [OrderController::class, 'index']);

    Route::post('/logout', [CustomerAuthController::class, 'logout']);
});
