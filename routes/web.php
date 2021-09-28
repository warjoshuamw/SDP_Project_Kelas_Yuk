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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', 'EssentialController@GoToLogin');
Route::get('register', 'EssentialController@GoToRegister');

Route::prefix('murid')->group(function () {
    Route::get('/', 'muridController@goToKelas');
});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@goToKelas');
});
