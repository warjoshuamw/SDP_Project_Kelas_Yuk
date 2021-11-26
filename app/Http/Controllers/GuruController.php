<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\D_Kuis;
use App\Models\JawabanMuridKuis;
use App\Models\Kelas;
use App\Models\Kuis;
use App\Models\Murid;
use App\Models\NilaiTugasMurid;
use App\Models\Reply;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use stdClass;

class GuruController extends Controller
{
    public function goToKelas(Request $request)
    {
        // dd(Auth::guard('satpam_pengguna')->user()->pengguna_id);
        $pengguna_id = Auth::guard('satpam_pengguna')->user()->pengguna_id;
        if ($pengguna_id == 'default') return back()->with('message', 'error');
        $dataKelas = Kelas::where('pengguna_id', '=', $pengguna_id)->get();
        $user_login =  Auth::guard('satpam_pengguna')->user();
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
        $dataUser = Auth::guard('satpam_pengguna')->user();
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
        $pengguna =  Auth::guard('satpam_pengguna')->user();
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
        $user_logged =  Auth::guard('satpam_pengguna')->user();
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
        $user_login =  Auth::guard('satpam_pengguna')->user();
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
        $dataUser =  Auth::guard('satpam_pengguna')->user();
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
        $details = [
            'title' => $request->tugas_nama,
            'body' => $request->tugas_keterangan,
            'tanggal'=> 'Batas Akhir : '.$request->batas_akhir,
            ];
        foreach ($data_murid as $murid) {
            $tugasdibagi=NilaiTugasMurid::create([
                "tugas_id"=>$data_oldest->tugas_id,
                "murid_id"=>$murid->murid_id,
                "nilai"=>0,
            ]);
            // dd($murid->PunyaUser->pengguna_email);
            \Mail::to($murid->PunyaUser->pengguna_email)->send(new \App\Mail\MyTestMail($details));

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
    public function doBuatKuis(Request $request)
    {

        if (!$request->session()->has('idKuisSedangDibuat')) {
            //bila tidak di refresh
            $request->validate([
                'kuis_judul'=>'required',
                'batas_awal'=>'required|after:today',
                'batas_akhir'=>'required|after:batas_awal',
            ],[
                'kuis_judul.required'=>'kolom ini tidak boleh kosong',
                'batas_awal.required'=>'kolom ini tidak boleh kosong',
                'batas_awal.after'=>'kolom ini tidak dimulai kurang dari hari ini',
                'batas_akhir.required'=>'kolom ini tidak boleh kosong',
                'batas_akhir.after'=>'kolom ini tidak boleh sebelum batas awal',
            ]);
            //melakukan insert data ke kuis
            $data = Kuis::create([
                'kelas_id'=> $request->id,
                'kuis_judul'=> $request->kuis_judul,
                'batas_awal'=> $request->batas_awal,
                'batas_akhir'=> $request->batas_akhir,
                'status'=> 1,
                'randomable'=> $request->randomable?1:0,
            ]);
            //data inserted
            $request->session()->put('idKuisSedangDibuat', $data->kuis_id);//menyimpan id yang baru disimpan
            $request->session()->put('kuisPage',$request->pages);

        }
        // dd(!$request->session()->has('idKuisSedangDibuat'));
        return redirect('/guru/kelas/'.$request->id.'/kuis/buat/1');
        // return back();
    }
    public function goToGuruBuatKuisDetail(Request $request)
    {

        $params['jenis'] = "";
        if ($request->session()->get('kuisPage') >= $request->pages) {
            //update data
            $data = $request->session()->get('soal', 'default')[$request->pages-1];
            if ($data->pilihan) {
                $params['jenis'] = "pilgan";
            }else if($data->isian){
                $params['jenis'] = "uraian";
            }
            $params['data'] = $data;
        }


        $dataKelas = Kelas::find($request->id);
        $params['pages'] = $request->pages;
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        return view('pages.guru.guruBuatKuisDetail',$params);
    }
    public function doKuisDetailCreate(Request $request)
    {
        if ($request->btnSimpan) {
            $request->session()->forget('idKuisSedangDibuat');
            $request->session()->forget('soal');
            $request->session()->forget('kuisPage');
            return redirect('guru/kelas/'.$request->id.'/kuis');
        }
        if ($request->btnKembali != null) {
            return redirect('/guru/kelas/'.$request->id.'/kuis/buat/'.$request->pages-1);
        }
        $request->validate(['jenis'=>'required']);

        if ($request->session()->get('idKuisSedangDibuat')) {
            if ($request->session()->get('kuisPage') >= $request->pages){
                $soal = $request->session()->get('soal', 'default')[$request->pages-1];
                if ($request->jenis == "pilgan") {
                    $data = D_Kuis::find($soal->d_kuis_id);
                    $data->isian = null;
                    $data->pertanyaan = $request->soal;
                    $data->pilihan_a = $request->pilihan_a;
                    $data->pilihan_b = $request->pilihan_b;
                    $data->pilihan_c = $request->pilihan_c;
                    $data->pilihan_d = $request->pilihan_d;
                    $data->pilihan = $request->radio;
                    $data->save();
                    $allSoal = $request->session()->get('soal', 'default');
                    $allSoal[$request->pages-1] = $data;
                    $request->session()->put('soal', $allSoal);
                }else if ($request->jenis == "uraian"){
                    $data = D_Kuis::find($soal->d_kuis_id);
                    $data->isian = $request->uraianJawaban;
                    $data->pertanyaan = $request->uraian;
                    $data->pilihan_a = null;
                    $data->pilihan_b = null;
                    $data->pilihan_c = null;
                    $data->pilihan_d = null;
                    $data->pilihan = null;
                    $data->save();
                    $allSoal = $request->session()->get('soal', 'default');
                    $allSoal[$request->pages-1] = $data;
                    $request->session()->put('soal', $allSoal);
                }
            }else{
                //insert kuis detail after
                $idKuis = $request->session()->get('idKuisSedangDibuat');
                //bila sedang membuat maka :
                //kita punya id, masukin ke detail, sebelumnya check dulu ini pilgan ato bukan
                if ($request->jenis == "uraian") {
                    $request->validate([
                        'uraian'=>'required',
                        'uraianJawaban'=>'required',
                    ]);
                    //insert data ke database dengan pengecekan udah di insert sebelumnya atau belum
                    $data = D_Kuis::create([
                        'kuis_id'=>$idKuis,
                        'pertanyaan'=>$request->uraian,
                        'isian'=>$request->uraianJawaban,
                    ]);
                    $request->session()->push('soal', $data);
                    $request->session()->put('kuisPage', $request->pages);
                }else if ($request->jenis == "pilgan"){
                    // dump($request->request);
                    $request->validate([
                        'radio'=>'required',
                        'soal'=>'required',
                        'pilihan_a'=>'required',
                        'pilihan_b'=>'required',
                        'pilihan_c'=>'required',
                        'pilihan_d'=>'required',
                    ]);
                    //insert data ke database dengan pengecekan udah di insert sebelumnya atau belum
                    // dd('added');
                    $data = D_Kuis::create([
                        'kuis_id'=>$idKuis,
                        'pertanyaan'=>$request->soal,
                        'pilihan_a'=>$request->pilihan_a,
                        'pilihan_b'=>$request->pilihan_b,
                        'pilihan_c'=>$request->pilihan_c,
                        'pilihan_d'=>$request->pilihan_d,
                        'pilihan'=>$request->radio,
                    ]);
                    $request->session()->push('soal', $data);
                    $request->session()->put('kuisPage', $request->pages);
                }
            }
        }
        return redirect('/guru/kelas/'.$request->id.'/kuis/buat/'.$request->pages+1);
    }
    public function doGuruBuatKuis(Request $request)
    {
        dump($request->toArray());
        return back();
        dd($request);
        $id_kelas_sekarang = $request->id;
        return redirect(`guru/kelas/{$id_kelas_sekarang}/kuis`);
    }

    public function goToLihatKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKuis'] = Kuis::find($request->idKuis);
        $params['pages'] = $request->pages;
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        $params['id_kuis'] = $request->idKuis;
        return view('pages.guru.guruLihatKuis',$params);
    }

    public function goToLihatKuisMurid(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKuis'] = Kuis::find($request->idKuis);
        $params['pages'] = $request->pages;
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        $params['murid_id'] = $request->idMurid;
        return view('pages.guru.guruLihatKuisMurid',$params);
    }
    public function guruMenyimpanPenilaianKuis(Request $request)
    {
        $request->validate([
            'nilai'=>[function($attribute, $value, $fail){
                $sum = 0;
                foreach ($value as $key => $v) {
                    $sum+=$v;
                }
                if ($sum > 100 || $sum < 0) {
                    $fail("Total Nilai Melebihi maksimal(100) atau Minimal(0)");
                }
            }]
        ]);
        foreach ($request->nilai as $key => $value) {
            $jawaban = JawabanMuridKuis::find($key);
            $jawaban->nilai = $value;
            $jawaban->save();
        }
        return back();
    }
    //============ Kuis Selesai ============

    //============ Penilaian Dimulai ============
    public function goToGuruPenilaian(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;

        //mencari data yang ditampilkan
        //1. mencari murid yang mengikuti kelas
        $dataTampilan = [];
        $dataMurid = $dataKelas->Murid;
        foreach ($dataMurid as $key => $value) {
            //mencari murid
            $murid = new stdClass();
            $murid->murid_id = $value->pivot->murid_id;
            $murid->murid_nama = $value->pengguna_nama;
            //selesai mencari murid
            $dataTampilan[] = $murid; //masukkan murid ke dalam data tampungan
        }

        $nilaiMurid = [];
        $dataKuis = $dataKelas->Kuis; //mencari kuis dalam kelas
        $sum = [];
        foreach ($dataKuis as $key => $value) {
            //mendapatkan kuis dalam kelas
            //mencari jawaban kuis
            foreach ($value->D_Kuis as $key => $v) {
                foreach ($v->KuisJawaban as $key => $nilai) {
                    if (isset($sum[$v->kuis_id][$nilai->murid_id])) {
                        $sum[$v->kuis_id][$nilai->murid_id] += $nilai->pivot->nilai;
                    } else {
                        $sum[$v->kuis_id][$nilai->murid_id] = $nilai->pivot->nilai;
                    }

                }
            }
        }
        dump($sum); 

        dd($dataTampilan);

        return view('pages.guru.guruPenilaian', $params);
    }

    //============ Penilaian Selesai ============

}
