<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'verify' => true,
    'register' => false
]);
Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('frontend.index');
        Route::get('tentang-kami', 'tentang_kami')->name('frontend.tentang_kami');
        Route::prefix('trip')->group(function(){
            Route::get('/', 'trip')->name('frontend.trip');
            Route::get('{id}/{trip_code}', 'trip_detail')->name('frontend.trip_detail');
        });
        Route::get('team', 'team')->name('frontend.team');
        Route::get('kontak-kami', 'kontak_kami')->name('frontend.kontak_kami');
    });

    // Route::get('/', function () {
    //     return view('frontend.index');
    // })->name('frontend.index');

    // Route::get('tentang-kami', function () {
    //     return view('frontend.tentang_kami');
    // })->name('frontend.tentang_kami');

    // Route::get('team', function () {
    //     return view('frontend.team');
    // })->name('frontend.team');

    // Route::get('kontak-kami', function () {
    //     return view('frontend.kontak_kami');
    // })->name('frontend.kontak_kami');

    Route::get('lay', function() {
        return view('layouts.backend.app');
    });

    // Route::get('trips', [App\Http\Controllers\TripController::class, 'index']);
    // Route::get('trips/{trip}', [App\Http\Controllers\TripController::class, 'show']);

    Route::get('sitemap.xml', function () {
        $data['posts'] = [
            [
                'id' => 1,
                'slug' => '',
                'created_at' => '2025-08-10 08:00:00'
            ],
            [
                'id' => 2,
                'slug' => 'tentang-kami',
                'created_at' => '2025-08-10 08:00:00'
            ],
            [
                'id' => 3,
                'slug' => 'team',
                'created_at' => '2025-08-10 08:00:00'
            ],
            [
                'id' => 4,
                'slug' => 'kontak-kami',
                'created_at' => '2025-08-10 08:00:00'
            ],
        ];
        // return view('frontend.sitemap',$data);
        return response()->view('frontend.sitemap',$data)->header('Content-Type', 'text/xml');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => ['role:Administrator']], function(){
            Route::prefix('admin')->group(function(){
                Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')->middleware('verified');
                Route::prefix('trips')->group(function(){
                    Route::controller(App\Http\Controllers\TripController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.trip')->middleware('verified');
                        Route::get('create', 'create')->name('admin.trip.create')->middleware('verified');
                        Route::post('simpan', 'simpan')->name('admin.trip.simpan')->middleware('verified');
                        Route::get('{id}', 'show')->name('admin.trip.show')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.trip.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.trip.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.trip.destroy')->middleware('verified');
                    });
                });
                Route::prefix('bookings')->group(function(){
                    Route::controller(App\Http\Controllers\BookingController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.booking')->middleware('verified');
                    });
                });
                Route::prefix('transactions')->group(function(){
                    Route::controller(App\Http\Controllers\TransactionController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.transaction')->middleware('verified');
                    });
                });
                Route::prefix('roles')->group(function(){
                    Route::controller(App\Http\Controllers\RoleController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.roles')->middleware('verified');
                        Route::get('create', 'create')->name('admin.roles.create')->middleware('verified');
                        Route::post('simpan', 'store')->name('admin.roles.store')->middleware('verified');
                        Route::get('{id}', 'detail')->name('admin.roles.detail')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.roles.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.roles.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.roles.destroy')->middleware('verified');
                    });
                });
                Route::prefix('permissions')->group(function(){
                    Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.permission')->middleware('verified');
                        Route::get('create', 'create')->name('admin.permission.create')->middleware('verified');
                        Route::post('simpan', 'store')->name('admin.permission.store')->middleware('verified');
                        Route::get('{id}/edit', 'edit')->name('admin.permission.edit')->middleware('verified');
                        Route::post('{id}/update', 'update')->name('admin.permission.update')->middleware('verified');
                        Route::delete('{id}/delete', 'destroy')->name('admin.permission.destroy')->middleware('verified');
                    });
                });
            });
        });

    });

});

