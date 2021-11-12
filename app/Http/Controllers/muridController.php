<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\NilaiTugasMurid;
use App\Models\Pengguna;
use App\Models\Reply;
use App\Models\Tugas;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    //Routing untuk
    public function goToKelas(Request $request)
    {
        $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        $dataKelasMurid = Pengguna::find($pengguna_id)->KelasMurid;
        $user_login = $request->session()->get('user_logged', 'default');
        $param['user_login'] = $user_login;
        $param['dataKelasMurid'] = $dataKelasMurid;

        return view('pages.murid.muridHome',$param);
    }
    public function goToDo(Request $request)
    {
        return view('pages.murid.muridToDo');
    }
    public function DoJoinKelas(Request $request)
    {
        $kode=$request->kode_join;
        $dataUser = $request->session()->get('user_logged', 'default');
        $dataKelas=Kelas::get();
        // dd($dataKelas);
        $kelasyangdijoin=[];

        $ketemu=false;
        foreach ($dataKelas as $kelas) {
            if($kelas->kelas_kode==$kode){
                $kelasyangdijoin=$kelas;
                $ketemu=true;
            }
        }

        if($ketemu==true){
            $hasil=Murid::create([
                'kelas_id'=>$kelasyangdijoin->kelas_id,
                'pengguna_id'=>$dataUser->pengguna_id,
            ]);
        }else{

        }


        // $dataKelas = Kelas::find($request->id);
        return back();
    }
    public function goToMuridFeed(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;

        // dd($dataKelas);
        $params['dataFeed'] = $dataKelas->Feed;
        // dd($dataKelas->Feed);
        // $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Feed);
        return view('pages.murid.murid', $params);
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

    public function doAddReply(Request $request)
    {
        $user_logged = $request->session()->get('user_logged', 'default');
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
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataKelas->Tugas;
        $params['id_kelas_sekarang'] = $request->id;
        $user_login = $request->session()->get('user_logged', 'default');
        $params['user_login'] = $user_login;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.murid.muridLihatDaftarTugas', $params);
    }


    public function goTomuridLihatTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $dataTugas= Tugas::find($request->idTugas);
        // dd($dataTugas);
        $params['dataKelas'] = $dataKelas;
        $params['dataTugas'] = $dataTugas;
        $params['id_kelas_sekarang'] = $request->id;

        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.murid.muridLihatTugas', $params);
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
    //============ Tugas Selesai ============
    //============ Kuis Dimulai ============
    public function goTomuridKuis(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        $params['dataKuis'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.murid.muridKuis', $params);
    }
    //============ Kuis Selesai ============

    //============ Penilaian Dimulai ============
    public function goTomuridPenilaian(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $params['dataKelas'] = $dataKelas;
        // $params['dataPenilaian'] = $dataKelas->Kuis;
        $params['id_kelas_sekarang'] = $request->id;
        // dd($dataKelas->Tugas);
        // dd($dataKelas->Feed);
        return view('pages.murid.muridPenilaian', $params);
    }
    public function doUploadTugas(Request $request)
    {
        $user_login = $request->session()->get('user_logged', 'default');
        $id_tugas=$request->id_tugas;
        // dd($id_tugas);
        $file = $request->file('file');

        // dd($file);
		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload


		// Gambar::create([
		// 	'file' => $nama_file,
		// 	'keterangan' => $request->keterangan,
        //
		// ]);
        $tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

        $result=NilaiTugasMurid::where('tugas_id','=',$id_tugas)->get();

        foreach ($result as $res) {
            if($res->PunyaMurid->pengguna_id==$user_login->pengguna_id){
                // dd($nama_file);
                $res->url_pengumpulan=$nama_file;
                $res->save();
            }
        }

        // $result->url_soal=$nama_file;
        // $result->save();

        return back();
    }
}
