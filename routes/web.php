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
    Route::get('/', function () {
        return view('frontend.index');
    })->name('frontend.index');

    Route::get('tentang-kami', function () {
        return view('frontend.tentang_kami');
    })->name('frontend.tentang_kami');

    Route::get('team', function () {
        return view('frontend.team');
    })->name('frontend.team');

    Route::get('kontak-kami', function () {
        return view('frontend.kontak_kami');
    })->name('frontend.kontak_kami');

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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

