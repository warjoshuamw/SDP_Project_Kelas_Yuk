<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function goToKelas(Request $request)
    {

         $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        if($pengguna_id == 'default') return back()->with('message','error');
            $dataKelas = Kelas::where('pengguna_id','=',$pengguna_id)->get();
            return view('pages.guru.guruHome',['dataKelas'=>$dataKelas]);
    }
}
