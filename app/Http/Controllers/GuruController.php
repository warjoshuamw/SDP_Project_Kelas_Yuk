<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kelas;
use App\Models\Tugas;
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

        // dd($dataKelas);
        $params['dataFeed'] = $dataKelas->Feed;
        // $params['id_kelas_sekarang'] = $request->id;
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

    public function goToGuruBeriTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataKelas->Tugas;
        $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.guru.guruBeriTugas', $params);
    }

    public function goToGuruLihatTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $dataTugas= Tugas::find($request->idTugas);
        // dd($dataTugas);
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataTugas;

        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.guru.guruLihatTugas', $params);
    }

    public function doAddTugas(Request $request)
    {
        $dataUser = $request->session()->get('user_logged', 'default');
        $dataKelas = Kelas::find($request->id);
        $hasil = $dataKelas->Tugas()->create([
            "kelas_id" => $dataKelas->kelas_id,
            "tugas_nama"=>$request->tugas_nama,
            "tugas_keterangan" => $request->tugas_keterangan,
            "batas_awal"=>$request->batas_awal,
            "batas_akhir"=>$request->batas_akhir,
            "url_soal"=>"tidak tau url apa bang",
            "status"=>0,
        ]);
        return back();
    }

    public function goToGuruKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataKuis'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.guru.guruKuis', $params);
    }

    public function goToGuruPenilaian(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        // $params['dataPenilaian'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.guru.guruPenilaian', $params);
    }
    public function doAddComment(Request $request)
    {
        $comment = $request->comment;
        $kelas_id = $request->kelas_id;
        $feed_id = $request->feed_id;
        $pengguna = $request->session()->get('user_logged', 'default');
        $hasil = Comment::create([
            'feed_id'=>$feed_id,
            'pengguna_id'=>$pengguna->pengguna_id,
            'comment_creator'=>$pengguna->pengguna_nama,
            'keterangan'=>$comment,
        ]);

        return back();
    }
}
