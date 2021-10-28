<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EssentialController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function GoToDoLogin(Request $request)
    {
        $ceklogin=false;
        $email=$request->input('email');
        $password=$request->input('password');
        $data_pengguna = Pengguna::withTrashed()->orderBy('pengguna_id','desc')->get();


        if($data_pengguna!=null){
            foreach ($data_pengguna as $pgw ) {
                if($pgw->pengguna_email==$email && $pgw->pengguna_password==$password ){
                   $ceklogin=true;
                   $tempuser['pengguna_nama']=$pgw->pengguna_nama;
                   $tempuser['pengguna_email']=$pgw->pengguna_email;
                   $tempuser['pengguna_peran']=$pgw->pengguna_peran;
                   $tempuser['pengguna_tampilan']=$pgw->pengguna_tampilan;
                }
            }
        }

        if($ceklogin==false){
            return view("pages.essential.login",['gagal'=>true]);
        }

        $request->session()->push('tempuser', $tempuser);
        $request->session()->put('active', $tempuser['pengguna_peran']);
        // dd($data_pegawai);
        if($tempuser['pengguna_peran']=="0"){
            return view('pages.guru.guruHome');
        }else if($tempuser['pengguna_peran']=="1"){

            return view("pages.murid.muridHome");
        }
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }

    public function GoToDoRegister(Request $request)
    {
        $data_pengguna = Pengguna::withTrashed()->orderBy('pengguna_id','desc')->get();
        // dd($data_pengguna->pengguna_email);
        $request -> validate(
            [
                'pengguna_nama' => ['required'],
                'pengguna_email'=> [
                    'required',
                    function ($attr, $value, $fail) use($data_pengguna) {
                        if($data_pengguna!=null){
                            foreach ($data_pengguna as $pgw ) {
                                if($pgw->pengguna_email==$value){
                                    $fail('email sudah dipakai');
                                }
                            }
                        }

                    }

                ],
                'pengguna_peran' => ['required'],
                'pengguna_password' => ['required', 'confirmed'],
            ],
            [
                'pengguna_nama.required' => "nama harus diisi",
                'pengguna_email.required' => "email harus diisi",
                'pengguna_password.confirmed' => "password and confirm password harus sama",
            ]
        );

        $result =Pengguna::create($request->all()+ ['pengguna_tampilan' => '0']);


        return view("pages.essential.Register",['register'=>true]);
    }
    public function goToLandingPage(Request $request)
    {
        $param = [];
        return view('pages.essential.landing',$param);
    }
}
