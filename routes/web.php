<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'EssentialController@goToLandingPage');
Route::get('/login', 'EssentialController@GoToLogin');
Route::get('dologin', 'EssentialController@GoToDoLogin');
Route::get('register', 'EssentialController@GoToRegister');
Route::get('cobagila', function () {
    return view('pages.essential.cobasidebar');
});

Route::prefix('murid')->group(function () {
    Route::get('/', 'MuridController@goToKelas');
    Route::prefix('/kelas')->group(function () {
        // Route::get('/buat', ''); //buat kelas
        Route::get('/{id}/home', function ($id) {
            return view('pages.kelas.murid');
        });

    });
});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@goToKelas');
    Route::prefix('/kelas')->group(function () {
        // Route::get('/buat', ''); //buat kelas
        Route::get('/{id}/home', function ($id) {
            return view('pages.kelas.guru');
        });
        Route::get('/{id}/tugas', function ($id) {
            return view('pages.kelas.guruBeriTugas');
        });
    });
});
