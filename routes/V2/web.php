<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'verify' => true,
    'register' => true
]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::middleware('LogVisits')->group(function(){
    //     });
    Route::controller(App\Http\Controllers\V2\FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('frontend.index');
        Route::get('tentang-kami', 'tentang_kami')->name('frontend.tentang_kami');
        Route::prefix('trip')->group(function(){
            Route::get('/', 'trip')->name('frontend.trip');
            Route::get('{id}/{trip_code}', 'trip_detail')->name('frontend.trip_detail');
        });
    });
    
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => ['role:Administrator', 'LogVisits']], function(){
            Route::prefix('admin')->group(function(){
                Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')->middleware('verified');
                Route::controller(App\Http\Controllers\TripController::class)->group(function () {
                    Route::prefix('trips')->group(function(){
                        Route::get('/', 'index')->name('admin.trip')->middleware('verified');
                        Route::get('create', 'create')->name('admin.trip.create')->middleware('verified');
                        Route::post('simpan', 'simpan')->name('admin.trip.simpan')->middleware('verified');
                        Route::get('{id}', 'show')->name('admin.trip.show')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.trip.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.trip.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.trip.destroy')->middleware('verified');
                        Route::get('{id}/schedule', 'schedule')->name('admin.trip.schedule')->middleware('verified');
                        Route::post('{id}/schedule/simpan', 'schedule_simpan')->name('admin.trip.schedule.simpan')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\BookingController::class)->group(function () {
                    Route::prefix('bookings')->group(function(){
                        Route::get('/', 'index')->name('admin.booking')->middleware('verified');
                        Route::get('search', 'searchBooking')->name('admin.booking.searchBooking')->middleware('verified');
                        Route::post('confirm/simpan', 'konfirmasi_simpan')->name('admin.booking.konfirmasi.simpan')->middleware('verified');
                        Route::get('{id}', 'konfirmasi')->name('admin.booking.konfirmasi')->middleware('verified');
                        Route::get('{id}/detail', 'detail')->name('admin.booking.detail')->middleware('verified');
                        Route::get('{id}/cetak-tiket', 'cetakTiket')->name('admin.booking.cetakTiket')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\TransactionController::class)->group(function () {
                    Route::prefix('transactions')->group(function(){
                        Route::get('/', 'index')->name('admin.transaction')->middleware('verified');
                        Route::get('testing', 'testing')->middleware('verified');
                        Route::get('{id}/download', 'downloadInvoice')->name('admin.transaction.download')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\UserController::class)->group(function () {
                    Route::prefix('users')->group(function(){
                        Route::get('/', 'index')->name('admin.users')->middleware('verified');
                        Route::get('create', 'create')->name('admin.users.create')->middleware('verified');
                        Route::post('simpan', 'store')->name('admin.users.store')->middleware('verified');
                        Route::get('{generate}', 'edit')->name('admin.users.edit')->middleware('verified');
                        Route::post('{generate}/update', 'update')->name('admin.users.update')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\RoleController::class)->group(function () {
                    Route::prefix('roles')->group(function(){
                        Route::get('/', 'index')->name('admin.roles')->middleware('verified');
                        Route::get('create', 'create')->name('admin.roles.create')->middleware('verified');
                        Route::post('simpan', 'store')->name('admin.roles.store')->middleware('verified');
                        Route::get('{id}', 'detail')->name('admin.roles.detail')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.roles.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.roles.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.roles.destroy')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
                    Route::prefix('permissions')->group(function(){
                        Route::get('/', 'index')->name('admin.permission')->middleware('verified');
                        Route::get('create', 'create')->name('admin.permission.create')->middleware('verified');
                        Route::post('simpan', 'store')->name('admin.permission.store')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.permission.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.permission.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.permission.destroy')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\VisitorController::class)->group(function () {
                    Route::prefix('visitors')->group(function(){
                        Route::get('/', 'index')->name('admin.visitor')->middleware('verified');
                    });
                });
            });
        });
    });
});