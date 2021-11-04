<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    //Routing untuk
    public function goToKelas(Request $request)
    {
        $pengguna_id = $request->session()->get('user_logged', 'default')->pengguna_id;
        $dataKelasMurid = Pengguna::find($pengguna_id)->KelasMurid;
        $user_login = $request->session()->get('user_logged', 'default');
        $param['dataKelasMurid'] = $dataKelasMurid;
        $param['user_login'] = $user_login;
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
}
