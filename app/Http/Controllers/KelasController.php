<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function doAddKelas(Request $request)
    {
        $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        if($pengguna_id == 'default') return back()->with('message','error');
        $kelas_nama = explode(' ',$request->kelas_nama);
        $kelas_kode = strtoupper(substr($kelas_nama[0],0,3));
        $hasil = Kelas::create($request->all() + ['pengguna_id'=>$pengguna_id,'kelas_kode'=>$kelas_kode,'status'=>true]);
        if ($hasil) {
            return back()->with("message","berhasil menambah kelas");
        }else{
            return back()->with("message","gagal menambah kelas");
        }
    }
}
