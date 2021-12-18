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

Route::get('/', 'EssentialController@goToLandingPage')->middleware('is_logout');
Route::get('/login', 'EssentialController@GoToLogin')->middleware('is_logout');
Route::get('/logout', 'EssentialController@GoTologout')->middleware('is_login');
Route::get('login/dologin', 'EssentialController@GoToDoLogin');
Route::get('register', 'EssentialController@GoToRegister')->middleware('is_logout');
Route::get('register/doregister', 'EssentialController@GoToDoRegister');
Route::get('cobagila', function () {
    return view('pages.essential.cobasidebar');
});

Route::prefix('murid')->middleware('is_login')->middleware('is_murid')->group(function () {
    Route::get('/', 'MuridController@goToKelas');
    Route::get('/todo', 'MuridController@goToDo');
    Route::post('/dojoin', 'MuridController@DoJoinKelas');
    Route::prefix('/kelas')->group(function () {
        // Route::get('/buat', ''); //buat kelas
        Route::get('/{id}/home', 'MuridController@goToMuridFeed');
        Route::get('/{id}/home/add', 'MuridController@doAddFeed');
        Route::get('/{kelas_id}/home/comment/{feed_id}/add', 'MuridController@doAddComment');
        Route::get('/{kelas_id}/home/reply/{comment_id}/add', 'MuridController@doAddReply');
        Route::get('/{id}/tugas', 'MuridController@goTomuridTugas');
        Route::get('/{id}/tugas/{idTugas}', 'MuridController@goTomuridLihatTugas');
        Route::post('/{id}/tugas/uploadtugas', 'MuridController@doUploadTugas');

        //murid kuis
        Route::get('/{id}/kuis', 'MuridController@goTomuridKuis');
        Route::get('/{id}/kuis/{idKuis}', 'MuridController@goToJawabKuis');
        Route::post('/{id}/kuis/{idKuis}/submit', 'MuridController@doSubmitKuis');

        Route::get('/{kelas_id}/home/comment/{feed_id}/add', 'MuridController@doAddComment');
        Route::get('/{kelas_id}/home/reply/{comment_id}/add', 'MuridController@doAddReply');
        Route::get('/{id}/daftarnilai','MuridController@goTomuridPenilaian');

        //murid (murid kelas)
        Route::get('/{id}/listMurid','MuridController@goToListMuridKelas');
    });
});

Route::prefix('guru')->middleware('is_login')->middleware('is_guru')->group(function () {
    Route::get('/', 'GuruController@goToKelas');
    Route::prefix('/kelas')->group(function () {
        Route::post('/buat', 'KelasController@doAddKelas'); //buat kelas
        Route::get('/{id}/tugas', 'GuruController@goToGuruBeriTugas');
        Route::post('/{id}/tugas/add', 'GuruController@doAddTugas');
        Route::get('/{id}/tugas/{idTugas}', 'GuruController@goToGuruLihatTugas');
        //routing feed
        Route::get('/{id}/home', 'GuruController@goToGuruFeed');
        Route::get('/{id}/home/add', 'GuruController@doAddFeed');
        Route::get('/{kelas_id}/home/comment/{feed_id}/add', 'GuruController@doAddComment');
        Route::get('/{kelas_id}/home/reply/{comment_id}/add', 'GuruController@doAddReply');
        //routing kuis
        Route::get('/{id}/kuis', 'GuruController@goToGuruKuis');
        Route::get('/{id}/kuis/buat', 'GuruController@goToGuruBuatKuis');
        Route::get('/{id}/kuis/buat/do', 'GuruController@doBuatKuis');
        Route::get('/{id}/kuis/buat/{pages}/do', 'GuruController@doKuisDetailCreate');
        Route::get('/{id}/kuis/buat/{pages}', 'GuruController@goToGuruBuatKuisDetail');
        Route::post('/{id}/kuis/buat/do', 'GuruController@doGuruBuatKuis');
        Route::get('/{id}/kuis/{idKuis}','GuruController@goToLihatKuis');
        Route::get('/{id}/kuis/{idKuis}/{idMurid}', 'GuruController@goToLihatKuisMurid');
        Route::post('/{id}/kuis/{idKuis}/{idMurid}/simpan','GuruController@guruMenyimpanPenilaianKuis');

        //routing guru penilaian
        Route::get('/{id}/penilaian', 'GuruController@goToGuruPenilaian');
        Route::post('/{id}/penilaian/{idMurid}/simpan', 'GuruController@guruMenyimpanPenilaianTugas');

        //routing orang
        Route::get('/{id}/listMurid','GuruController@goToListMuridKelas');
    });
});

//routing untuk mendapatkan components
Route::get('cardKuisPilgan', 'EssentialController@cardKuisPilgan');
Route::get('cardKuisUraian', 'EssentialController@cardKuisUraian');

Route::get('download/{id}/{namafile}','EssentialController@downloadfile');
Route::get('downloadall/{id}','EssentialController@downloadallfile');
