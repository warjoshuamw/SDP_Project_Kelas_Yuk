<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function doAddKelas(Request $request)
    {
        /**
         * Kodingan kodingan untuk kelas code
         */
        $request->validate([
            'kelas_nama'=>'required',
            'kelas_deskripsi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required|after:waktu_mulai',
        ],[
            'kelas_nama.required'=>'kolom ini tidak boleh kosong',
            'kelas_deskripsi.required'=>'kolom ini tidak boleh kosong',
            'waktu_mulai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.after'=>'kolom ini tidak boleh sebelum waktu mulai',
        ]);

        $length = 6;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        $kelas_kode = implode('', $pieces);


        $pengguna_id =  Auth::guard('satpam_pengguna')->user()->pengguna_id;
        if ($pengguna_id == 'default') return back()->with('message', 'error');
        $kelas_nama = explode(' ', $request->kelas_nama);
        $hasil = Kelas::create($request->all() + ['pengguna_id' => $pengguna_id, 'kelas_kode' => $kelas_kode, 'status' => true]);
        if ($hasil) {
            return back()->with("message", "berhasil menambah kelas");
        } else {
            return back()->with("message", "gagal menambah kelas");
        }
    }
}
