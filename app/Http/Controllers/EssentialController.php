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
        $data_pengguna = Pengguna::all();


        if($data_pengguna!=null){
            foreach ($data_pengguna as $pgw ) { //cek login user
                if($pgw->pengguna_email==$email && $pgw->pengguna_password==$password ){
                   $ceklogin=true;
                   $tempuser['pengguna_nama']=$pgw->pengguna_nama;
                   $tempuser['pengguna_email']=$pgw->pengguna_email;
                   $tempuser['pengguna_peran']=$pgw->pengguna_peran;
                   $tempuser['pengguna_tampilan']=$pgw->pengguna_tampilan;
                }
            }
        }

        if($ceklogin == false){
            return view("pages.essential.login",['gagal'=>true]);
        }

        $request->session()->push('user_logged', $tempuser);


        if($tempuser['pengguna_peran']=="0"){
            //bila user merupakan guru maka arahkan ke page guru
            return view('pages.guru.guruHome');
        }else if($tempuser['pengguna_peran']=="1"){
            //bila user adalah murid maka arahkan ke page murid
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
        $request -> validate(
            [
                'pengguna_nama' => ['required'],
                'pengguna_email'=> [
                    'required','unique:pengguna,pengguna_email'
                ],
                'pengguna_peran' => ['required'],
                'pengguna_password' => ['required', 'confirmed'],
            ],
            [
                'pengguna_nama.required' => "nama harus diisi",
                'pengguna_email.required' => "email harus diisi",
                'pengguna_password.confirmed' => "password and confirm password harus sama",
                'pengguna_password.required' => "password harus diisi",
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
