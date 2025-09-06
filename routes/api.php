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
        });
    });
    // Route::middleware('auth:sanctum')->group( function () {
    //     Route::get('/',function(){
    //         return 'test';
    //     });

    // });
});
