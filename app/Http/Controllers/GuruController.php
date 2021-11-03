<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function goToKelas(Request $request)
    {
        $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        if ($pengguna_id == 'default') return back()->with('message', 'error');
        $dataKelas = Kelas::where('pengguna_id', '=', $pengguna_id)->get();
        return view('pages.guru.guruHome', ['dataKelas' => $dataKelas]);
    }

    public function goToGuruFeed(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataFeed'] = $dataKelas->Feed;
        // dd($dataKelas->Feed);
        return view('pages.guru.guruFeed', $params);
    }

    public function doAddFeed(Request $request)
    {
        $dataUser = $request->session()->get('user_logged', 'default');
        $dataKelas = Kelas::find($request->id);
        $hasil = $dataKelas->Feed()->create([
            "kelas_id" => $dataKelas->kelas_id,
            "pengguna_id" => $dataUser->pengguna_id,
            "feed_creator" => $dataUser->pengguna_nama,
            "keterangan" => $request->keterangan,
        ]);
        return back();
    }
}
