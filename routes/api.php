<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::group(['middleware' => 'auth:api'], function () {
    // });
    Route::controller(App\Http\Controllers\Api\LoginController::class)->group(function () {
        Route::post('login','login');
    });
    Route::controller(App\Http\Controllers\Payment\TripayController::class)->group(function () {
        Route::post('callback', 'handle');
        Route::prefix('payment')->group(function () {
            Route::get('/', 'getPayment');
            Route::post('handle_open_payment', 'handle_open_payment');
            Route::get('handle_open_payment_new', 'handle_open_payment_new');
        });
    });
    Route::middleware('auth:sanctum')->group( function () {
    //     Route::get('/',function(){
    //         return 'test';
    //     });
        Route::group(['middleware' => ['role:Users']], function(){
            Route::controller(App\Http\Controllers\Api\TripsController::class)->group(function () {
                Route::prefix('trips')->group(function(){
                    Route::get('/', 'getTrip');
                });
            });
            Route::controller(App\Http\Controllers\Api\BookingController::class)->group(function () {
                Route::prefix('my-booking')->group(function(){
                    Route::get('/', 'getMyBooking');
                });
            });
            Route::controller(App\Http\Controllers\Api\UserController::class)->group(function () {
                Route::prefix('user')->group(function(){
                    Route::get('/', 'getUser');
                    Route::get('{generate}', 'getUserDetail');
                });
            });
        });
    });
});
