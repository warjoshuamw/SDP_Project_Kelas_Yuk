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
    Route::post('/dojoin', 'MuridController@DoJoinKelas');
    Route::prefix('/kelas')->group(function () {
        // Route::get('/buat', ''); //buat kelas
        Route::get('/{id}/home', 'MuridController@goToMuridFeed');
        Route::get('/{id}/home/add', 'MuridController@doAddFeed');
        Route::get('/{id}/tugas', 'MuridController@goTomuridTugas');
        Route::get('/{id}/tugas/{idTugas}','MuridController@goTomuridLihatTugas');
        Route::post('/{id}/tugas/uploadtugas','MuridController@doUploadTugas');
        Route::get('/{id}/kuis', 'MuridController@goTomuridKuis');
        Route::get('/{kelas_id}/home/comment/{feed_id}/add','MuridController@doAddComment');
        Route::get('/{kelas_id}/home/reply/{comment_id}/add','MuridController@doAddReply');
        Route::get('/{id}/daftarnilai', function ($id) {
            return view('pages.murid.nilaiMurid');
        });
    });
});

Route::prefix('guru')->group(function () {
    Route::get('/', 'GuruController@goToKelas');
    Route::prefix('/kelas')->group(function () {
        Route::post('/buat', 'KelasController@doAddKelas'); //buat kelas
        Route::get('/{id}/home', 'GuruController@goToGuruFeed');
        Route::get('/{id}/home/add', 'GuruController@doAddFeed');
        Route::get('/{id}/tugas', 'GuruController@goToGuruBeriTugas');
        Route::post('/{id}/tugas/add', 'GuruController@doAddTugas');
        Route::get('/{id}/tugas/{idTugas}','GuruController@goToGuruLihatTugas');
        Route::get('/{id}/penilaian', 'GuruController@goToGuruPenilaian');
        Route::get('/{id}/kuis', 'GuruController@goToGuruKuis');
        Route::get('/{kelas_id}/home/comment/{feed_id}/add','GuruController@doAddComment');
        Route::get('/{kelas_id}/home/reply/{comment_id}/add','GuruController@doAddReply');

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
