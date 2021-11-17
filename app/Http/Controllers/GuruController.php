<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\NilaiTugasMurid;
use App\Models\Reply;
use App\Models\Tugas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function goToKelas(Request $request)
    {
        $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        if ($pengguna_id == 'default') return back()->with('message', 'error');
        $dataKelas = Kelas::where('pengguna_id', '=', $pengguna_id)->get();
        $user_login = $request->session()->get('user_logged', 'default');
        $param = [];
        $param['dataKelas'] = $dataKelas;
        $param['user_login'] = $user_login;

        return view('pages.guru.guruHome', $param);
    }
    //============ Feed Dimulai ============
    public function goToGuruFeed(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;

        // dd($dataKelas);
        $params['dataFeed'] = $dataKelas->Feed;
        // dd($dataKelas->Feed);
        // $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Feed);
        return view('pages.guru.guruFeed', $params);
    }

    public function doAddFeed(Request $request)
    {
        $dataUser = $request->session()->get('user_logged', 'default');
        $dataKelas = Kelas::find($request->id);
        if ($dataKelas->kelas_id && $dataUser->pengguna_id && $dataUser->pengguna_nama && $request->keterangan) {
            $hasil = $dataKelas->Feed()->create([
                "kelas_id" => $dataKelas->kelas_id,
                "pengguna_id" => $dataUser->pengguna_id,
                "feed_creator" => $dataUser->pengguna_nama,
                "keterangan" => $request->keterangan,
            ]);
        }
        return back();
    }

    public function doAddComment(Request $request)
    {
        $comment = $request->comment;
        $kelas_id = $request->kelas_id;
        $feed_id = $request->feed_id;
        $pengguna = $request->session()->get('user_logged', 'default');
        if ($feed_id && $pengguna->pengguna_id && $pengguna->pengguna_nama && $comment) {
            $hasil = Comment::create([
                'feed_id' => $feed_id,
                'pengguna_id' => $pengguna->pengguna_id,
                'comment_creator' => $pengguna->pengguna_nama,
                'keterangan' => $comment,
            ]);
        }

        return back();
    }

    public function doAddReply(Request $request)
    {
        $user_logged = $request->session()->get('user_logged', 'default');
        $keterangan = $request->keterangan;
        $comment_id = $request->comment_id;
        $pengguna_id = $user_logged->pengguna_id;
        $reply_creator = $user_logged->pengguna_nama;
        //TODO add reply ke table reply ambil
        if ($comment_id && $pengguna_id && $reply_creator && $keterangan) {
            $hasil = Reply::create([
                'comment_id' => $comment_id,
                'pengguna_id' => $pengguna_id,
                'reply_creator' => $reply_creator,
                'keterangan' => $keterangan,
            ]);
        }
        return back();
    }
    //============ Feed Selesai ============
    //============ Tugas Dimulai ============
    public function goToGuruBeriTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataKelas->Tugas;
        $params['id_kelas_sekarang'] = $request->id;
        $user_login = $request->session()->get('user_logged', 'default');
        $params['user_login'] = $user_login;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.guru.guruBeriTugas', $params);
    }

    public function goToGuruLihatTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $dataTugas = Tugas::find($request->idTugas);
        // dd($dataTugas);
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataTugas;
        $datatugasmurid=NilaiTugasMurid::where('tugas_id','=',$request->idTugas)->get();
        $params['datatugasmurid']=$datatugasmurid;
        // dd($datatugasmurid);
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
            "tugas_nama" => $request->tugas_nama,
            "tugas_keterangan" => $request->tugas_keterangan,
            "batas_awal" => $request->batas_awal,
            "batas_akhir" => $request->batas_akhir,
            "url_soal" => "tidak tau url apa bang",
            "status" => 0,
        ]);
        $data_oldest= Tugas::latest('tugas_id')->first();

        $kelastugas=$data_oldest->kelas_id;
        $data_murid=Murid::where('kelas_id','=',$kelastugas)->get();
        // dd($data_murid);
        foreach ($data_murid as $murid) {
            $tugasdibagi=NilaiTugasMurid::create([
                "tugas_id"=>$data_oldest->tugas_id,
                "murid_id"=>$murid->murid_id,
                "nilai"=>0,
            ]);
        }
        return back();
    }
    //============ Tugas Selesai ============
    //============ Kuis Dimulai ============
    public function goToGuruKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataKuis'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        return view('pages.guru.guruKuis', $params);
    }
    public function goToGuruBuatKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        return view('pages.guru.guruBuatKuis', $params);
    }
    public function goToGuruBuatKuisDetail(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['pages'] = $request->pages;
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        return view('pages.guru.guruBuatKuisDetail',$params);
    }
    public function doGuruBuatKuis(Request $request)
    {
        dump($request->toArray());
        return back();
        dd($request);
        $id_kelas_sekarang = $request->id;
        return redirect(`guru/kelas/{$id_kelas_sekarang}/kuis`);
    }
    //============ Kuis Selesai ============

    //============ Penilaian Dimulai ============
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
    //============ Penilaian Selesai ============

}
