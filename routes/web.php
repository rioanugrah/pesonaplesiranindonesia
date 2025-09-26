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
    'register' => true
]);
Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::middleware('LogVisits')->group(function(){
        Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
            Route::get('/', 'index')->name('frontend.index');
            Route::get('tentang-kami', 'tentang_kami')->name('frontend.tentang_kami');
            Route::prefix('trip')->group(function(){
                Route::get('/', 'trip')->name('frontend.trip');
                Route::get('{id}/{trip_code}', 'trip_detail')->name('frontend.trip_detail');
            });
            Route::get('team', 'team')->name('frontend.team');
            Route::get('kontak-kami', 'kontak_kami')->name('frontend.kontak_kami');
            Route::get('kebijakan-privasi', 'kebijakan_privasi')->name('frontend.kebijakanprivasi');
        });
    });

    // Route::get('test-email', function() {
    //     $data['billing'] = [
    //         'first_name' => 'Rio',
    //         'last_name' => 'Anugrah',
    //         'email' => 'rioanugrah999@gmail.com',
    //         'phone' => '08',
    //     ];
    //     return view('emails.payment',$data);
    //     \Mail::to('rioanugrah999@gmail.com')->send(new \App\Mail\Payment());
    //     dd("Email is sent successfully.");
    // });

    // Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    //     Route::get('coba-email/{id}', 'email')->name('backend.emailTest');
    // });

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
                'slug' => 'trip',
                'created_at' => '2025-08-10 08:00:00'
            ],
            [
                'id' => 4,
                'slug' => 'team',
                'created_at' => '2025-08-10 08:00:00'
            ],
            [
                'id' => 5,
                'slug' => 'kontak-kami',
                'created_at' => '2025-08-10 08:00:00'
            ],
        ];
        // return view('frontend.sitemap',$data);
        return response()->view('frontend.sitemap',$data)->header('Content-Type', 'text/xml');
    });

    // Route::controller(App\Http\Controllers\Payment\TripayController::class)->group(function () {
    //     Route::prefix('payment')->group(function () {
    //         Route::get('/', 'getPayment');
    //     });
    // });

    Route::group(['middleware' => 'auth'], function () {
        Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
            Route::prefix('checkout')->group(function(){
                Route::post('{id}/{trip_code}', 'checkout')->name('frontend.checkout')->middleware('verified');
                Route::post('{id}/{trip_code}/simpan', 'checkout_simpan')->name('frontend.checkout.simpan')->middleware('verified');
            });
        });

        Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
            Route::prefix('payment')->group(function () {
                Route::get('status', 'payment_success')->name('frontend.paymentSuccess');
            });
        });

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
                    });
                });
                Route::controller(App\Http\Controllers\BookingController::class)->group(function () {
                    Route::prefix('bookings')->group(function(){
                        Route::get('/', 'index')->name('admin.booking')->middleware('verified');
                        Route::post('confirm/simpan', 'konfirmasi_simpan')->name('admin.booking.konfirmasi.simpan')->middleware('verified');
                        Route::get('{id}', 'konfirmasi')->name('admin.booking.konfirmasi')->middleware('verified');
                        Route::get('{id}/detail', 'detail')->name('admin.booking.detail')->middleware('verified');
                    });
                });
                Route::controller(App\Http\Controllers\TransactionController::class)->group(function () {
                    Route::prefix('transactions')->group(function(){
                        Route::get('/', 'index')->name('admin.transaction')->middleware('verified');
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

        Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
            Route::get('send-email/{id}', 'email')->name('sendEmail')->middleware('verified');
        });

        Route::group(['middleware' => ['role:Users','LogVisits']], function(){
            Route::prefix('my-dashboard')->group(function(){
                Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
                    Route::get('home', 'index_user')->name('user.home')->middleware('verified');
                    Route::prefix('booking')->group(function(){
                        Route::get('{id}/{booking_code}', 'booking_detail_user')->name('user.booking.detail')->middleware('verified');
                        Route::get('{id}/{booking_code}/pdf', 'booking_pdf_user')->name('user.booking.pdf')->middleware('verified');
                    });
                });
            });
        });

    });

});

