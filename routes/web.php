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
Route::get('login/dologin', 'EssentialController@GoToDoLogin');
Route::get('register', 'EssentialController@GoToRegister');
Route::get('register/doregister', 'EssentialController@GoToDoRegister');
Route::get('cobagila', function () {
    return view('pages.essential.cobasidebar');
});

Route::prefix('murid')->group(function () {
    Route::get('/', 'MuridController@goToKelas');
    Route::get('/todo', 'MuridController@goToDo');
    Route::prefix('/kelas')->group(function () {
        // Route::get('/buat', ''); //buat kelas
        Route::get('/{id}/home', function ($id) {
            return view('pages.murid.murid');
        });
        Route::get('/{id}/tugas', function ($id) {
            return view('pages.murid.muridLihatDaftarTugas');
        });
        Route::get('/{id}/tugas/{idTugas}', function ($id, $idTugas) {
            return view('pages.murid.muridLihatTugas');
        });
        Route::get('/{id}/quiz', function ($id) {
            return view('pages.murid.muridLihatDaftarQuiz');
        });
        Route::get('/{id}/quiz/{idTugas}', function ($id, $idTugas) {
            return view('pages.murid.muridQuiz');
        });
        Route::get('/{id}/daftarnilai', function ($id) {
            return view('pages.murid.nilaiMurid');
        });
    });
});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@goToKelas');
    Route::prefix('/kelas')->group(function () {
        Route::post('/buat', 'KelasController@doAddKelas'); //buat kelas
        Route::get('/{id}/home', function ($id) {
            return view('pages.guru.guruFeed');
        });
        Route::get('/{id}/tugas', function ($id) {
            return view('pages.guru.guruBeriTugas');
        });
        Route::get('/{id}/tugas/{idTugas}', function ($id, $idTugas) {
            return view('pages.guru.guruLihatTugas');
        });
        Route::get('/{id}/penilaian', function ($id) {
            return view('pages.guru.guruPenilaian');
        });
        Route::get('/{id}/kuis', function ($id) {
            return view('pages.guru.guruKuis');
        });
        Route::get('/{id}/kuis/buat', function ($id) {
            return view('pages.guru.guruBuatKuis');
        });
        Route::get('/{id}/kuis/{idKuis}', function ($id) {
            return view('pages.guru.guruLihatKuis');
        });
        Route::get('/{id}/kuis/{idKuis}/{idMurid}', function ($id) {
            return view('pages.guru.guruLihatKuisMurid');
        });
    });
});
