<?php

use App\Http\Controllers\Api\CustomerAuthController;
use App\Http\Controllers\Api\CustomerCreditCardInfoController;
use App\Http\Controllers\Api\CustomerInfoController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

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


Route::post('/create_account', [CustomerAuthController::class, 'register']);
Route::post('/login', [CustomerAuthController::class, 'login']);
Route::post('/reset-password', [CustomerAuthController::class, 'reset_password'] );

Route::post('/sendmail', [MailController::class, 'sendMail']);
// get products list
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/packages', [PackageController::class, 'index']);

Route::post('/save_customer_info', [CustomerInfoController::class, 'SaveCustomersInfoOutOfArea']);
Route::post('/check_customer_location', [CustomerInfoController::class, 'CheckUserLocationInServiceArea']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['middleware' => ['isactivated']], function () {
        Route::post('/order', [OrderController::class, 'store']);
        Route::get('/order/{id}', [OrderController::class, 'show']);
        Route::get('/orders', [OrderController::class, 'index']);

        Route::post('/credit_card_details', [CustomerCreditCardInfoController::class , 'storeCreditCardDetails']);
        Route::get('/credit_card_details', [CustomerCreditCardInfoController::class , 'getCreditCardDetails']);
    });

    Route::post('/verify_otp', [CustomerAuthController::class, 'verifyOtp']);


    Route::post('/logout', [CustomerAuthController::class, 'logout']);
});
