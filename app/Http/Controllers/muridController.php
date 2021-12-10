<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\JawabanMuridKuis;
use App\Models\Kelas;
use App\Models\Kuis;
use App\Models\Murid;
use App\Models\NilaiTugasMurid;
use App\Models\Pengguna;
use App\Models\Reply;
use App\Models\Tugas;
use App\Notifications\NotifikasiKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    //Routing untuk
    public function goToKelas(Request $request)
    {
        $pengguna_id = Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataKelasMurid = Pengguna::find($pengguna_id)->KelasMurid;
        $user_login =  Auth::guard('satpam_pengguna')->user();
        $param['user_login'] = $user_login;
        $param['dataKelasMurid'] = $dataKelasMurid;
        $request->session()->put('navbarSelected', "home");

        return view('pages.murid.muridHome',$param);
    }
    public function goToDo(Request $request)
    {
        $user_login =  Auth::guard('satpam_pengguna')->user();
        $kelasMurid=$user_login->KelasMurid;
        $request->session()->put('navbarSelected', "todo");
        $param=[];
        $param['kelasMurid']=$kelasMurid;
        return view('pages.murid.muridToDo',$param);
    }
    public function DoJoinKelas(Request $request)
    {

        $kode=$request->kode_join;
        $dataUser =  Auth::guard('satpam_pengguna')->user();
        $dataKelas=Kelas::get();
        $kelasyangdijoin=[];
        $ketemu=false;
        foreach ($dataKelas as $kelas) {
            if($kelas->kelas_kode==$kode){
                $kelasyangdijoin=$kelas;
                $ketemu=true;
            }
        }
        $kelasyangada=Murid::where('pengguna_id','=',$dataUser->pengguna_id)->get();
        foreach ($kelasyangada as $kelas) {
           if ($kelas->kelas_id==$kelasyangdijoin->kelas_id) {
               return back();
           }
        }

        if($ketemu==true){
            $hasil=Murid::create([
                'kelas_id'=>$kelasyangdijoin->kelas_id,
                'pengguna_id'=>$dataUser->pengguna_id,
            ]);

            $muridskrg=Murid::where('pengguna_id','=',$dataUser->pengguna_id)->where('kelas_id','=',$kelasyangdijoin->kelas_id)->first();
            // dd($muridskrg);
            $tugasdikelas=Tugas::where('kelas_id','=',$kelasyangdijoin->kelas_id)->get();
            foreach ($tugasdikelas as $tugas) {
                $tugasdibagi=NilaiTugasMurid::create([
                    "tugas_id"=>$tugas->tugas_id,
                    "murid_id"=>$muridskrg->murid_id,
                    "nilai"=>0,
                ]);
            }
        }else{

        }
        $invoice=[];
        $invoice['kelas']=$kelasyangdijoin;
        Notification::send($dataUser, new NotifikasiKelas($dataUser,$kelasyangdijoin));

        return back();
    }
    public function goToMuridFeed(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;

        $request->session()->put('navbarSelected', "feed");
        $params['dataFeed'] = $dataKelas->Feed;
        return view('pages.murid.murid', $params);
    }

    public function doAddFeed(Request $request)
    {
        $dataUser =  Auth::guard('satpam_pengguna')->user();
        $dataKelas = Kelas::find($request->id);
        $hasil = $dataKelas->Feed()->create([
            "kelas_id" => $dataKelas->kelas_id,
            "pengguna_id" => $dataUser->pengguna_id,
            "feed_creator" => $dataUser->pengguna_nama,
            "keterangan" => $request->keterangan,
        ]);
        return back();
    }

    public function doAddComment(Request $request)
    {
        $comment = $request->comment;
        $kelas_id = $request->kelas_id;
        $feed_id = $request->feed_id;
        $pengguna =  Auth::guard('satpam_pengguna')->user();
        $hasil = Comment::create([
            'feed_id'=>$feed_id,
            'pengguna_id'=>$pengguna->pengguna_id,
            'comment_creator'=>$pengguna->pengguna_nama,
            'keterangan'=>$comment,
        ]);

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
        $hasil = Reply::create([
            'comment_id'=>$comment_id,
            'pengguna_id'=>$pengguna_id,
            'reply_creator'=>$reply_creator,
            'keterangan'=>$keterangan,
        ]);
        return back();
    }
    //============ Feed Selesai ============
    //============ Tugas Dimulai ============
    public function goTomuridTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $request->session()->put('navbarSelected', "tugas");
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataKelas->Tugas()->where('batas_akhir','>=',Carbon::now())->where('batas_awal','<=',Carbon::now())->get();;
        $params['id_kelas_sekarang'] = $request->id;
        $user_login =  Auth::guard('satpam_pengguna')->user();
        $params['user_login'] = $user_login;
        return view('pages.murid.muridLihatDaftarTugas', $params);
    }


    public function goTomuridLihatTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $dataTugas= Tugas::find($request->idTugas);
        $dataUser =  Auth::guard('satpam_pengguna')->user();

        foreach ($dataUser->AdalahMurid as $usermurid) {
            if($usermurid->kelas_id==$request->id){
                $muridkelas=$usermurid;
            }
        };

        $datalaporan=NilaiTugasMurid::where('tugas_id','=',$request->idTugas)->where('murid_id','=',$muridkelas->murid_id)->first();
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataTugas;
        $params['datalapor'] = $datalaporan;
        $params['id_kelas_sekarang'] = $request->id;

        return view('pages.murid.muridLihatTugas', $params);
    }

    public function doAddTugas(Request $request)
    {
        $dataUser =  Auth::guard('satpam_pengguna')->user();
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
    //============ Tugas Selesai ============
    //============ Kuis Dimulai ============
    public function goTomuridKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $request->session()->put('navbarSelected', "kuis");
        $params['dataKelas'] = $dataKelas;
        $params['dataKuis'] = $dataKelas->Kuis()->where('batas_akhir','>=',Carbon::now())->where('batas_awal','<=',Carbon::now())->get();
        $params['id_kelas_sekarang'] = $request->id;
        return view('pages.murid.muridQuiz', $params);
    }
    public function goToJawabKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        //mencari kuis sudah dijawab atau belum
        $status = false;
        $user_logged = Auth::guard('satpam_pengguna')->user();
        $murid = Murid::where('kelas_id','=',$request->id)->where('pengguna_id','=',$user_logged->pengguna_id)->first();
        $d_kuis_id = Kuis::find($request->idKuis)->D_Kuis->first();
        if ($d_kuis_id) {
            $d_kuis_id = $d_kuis_id->d_kuis_id;
        }
        $isAnswered = DB::table('jawaban_murid_kuis')->where('d_kuis_id','=',$d_kuis_id)->where('murid_id','=',$murid->murid_id)->first();
        if ($isAnswered != null) {
            $status = true;
        }
        $params['status'] = $status;
        $params['dataKelas'] = $dataKelas;
        $params['dataKuis'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        $params['id_kuis_sekarang'] = $request->idKuis;
        $params['kuis_sekarang'] = Kuis::find($request->idKuis);
        return view('pages.murid.muridJawabKuis', $params);
    }
    public function doSubmitKuis(Request $request)
    {
        //do insert jawaban murid
        $user_logged = Auth::guard('satpam_pengguna')->user();;
        $murid = Murid::where('kelas_id','=',$request->id)->where('pengguna_id','=',$user_logged->pengguna_id)->first();
        if ($request->jawaban) {
            foreach ($request->jawaban as $key => $value) {
                JawabanMuridKuis::create(
                    [
                        'd_kuis_id' =>$key,
                        'murid_id'=>$murid->murid_id,
                        'jawaban' => $value,
                    ]
                );
            }
        }
        return back();

    }
    //============ Kuis Selesai ============

    //============ Penilaian Dimulai ============
    public function goTomuridPenilaian(Request $request)
    {
        $user_login =  Auth::guard('satpam_pengguna')->user();
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        $params['dataMurid'] = $user_login;
        $params['nofilter'] = false;

        $request->session()->put('navbarSelected', "nilai");
        foreach ($user_login->AdalahMurid as $usermurid) {
            if($usermurid->kelas_id==$request->id){
                $muridkelas=$usermurid;
            }
        };
        $dataNilai = [];
        //mengambil data kuis
        $dataKuis = $dataKelas->Kuis;

        if (isset($request->filter_jenis)) {
            $params['filter_jenis'] = $request->filter_jenis;

            if ($request->filter_jenis == "tugas") {
                $dataTugas = $dataKelas->Tugas;
                foreach ($dataTugas as $key => $value) {
                    $dataNilai[$value->tugas_id]['judul'] = $value->tugas_nama;
                    foreach ($value->nilaiTugas as $key => $nilai) {
                        if ($nilai->murid_id == $muridkelas->murid_id) {
                            $dataNilai[$value->tugas_id]['nilai'] = $nilai->nilai;
                        }
                    }
                }
            }else{
                foreach ($dataKuis as $key => $value) {
                    $dataNilai[$value->kuis_id]['judul'] = $value->kuis_judul;
                    $nilai = 0;
                    foreach ($value->D_Kuis as $key => $D_Kuis) {
                        foreach ($D_Kuis->KuisJawaban as $key => $jawaban) {
                            if ($muridkelas->murid_id == $jawaban->murid_id) {
                                $nilai += $jawaban->pivot->nilai;
                            }
                        }
                    }
                    $dataNilai[$value->kuis_id]['nilai'] = $nilai;

                }
            }
        }else{
            $params['nofilter'] = true;
        }
        $params['dataNilai'] = $dataNilai;

        return view('pages.murid.nilaiMurid', $params);
    }
    public function doUploadTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);

        $user_login =  Auth::guard('satpam_pengguna')->user();
        $id_tugas=$request->id_tugas;
        $file = $request->file('file_upload');

		$nama_file = $file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload


		// Gambar::create([
		// 	'file' => $nama_file,
		// 	'keterangan' => $request->keterangan,
        //
		// ]);
        // $tujuan_upload = 'data_file';
		// $file->move($tujuan_upload,$nama_file);

        // $path = Storage::putFileAs(
        //     'TugasKelas/'.$dataKelas->kelas_kode,
        //     $request->file('file_upload'),
        //     $nama_file
        // );
        $request->file('file_upload')->storeAs('TugasKelas/'.$dataKelas->kelas_kode,$nama_file, 'local');

        $result=NilaiTugasMurid::where('tugas_id','=',$id_tugas)->get();

        foreach ($result as $res) {
            if($res->PunyaMurid->pengguna_id==$user_login->pengguna_id){
                $res->url_pengumpulan=$nama_file;
                $res->save();
            }
        }

        // $result->url_soal=$nama_file;
        // $result->save();

        return back();
    }


    //============ List Murid Dimulai ============
    public function goToListMuridKelas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['id_kelas_sekarang'] = $request->id;
        $params['dataMurid'] = $dataKelas->murid;
        $request->session()->put('navbarSelected', "murid");
        return view('pages.murid.muridListMurid',$params);
    }
    //============ List Murid Selesai ============
}
