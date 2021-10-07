<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssentialController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function GoToDoLogin(Request $request)
    {
        $email=$request->input('Email');
        $password=$request->input('password');

        // dd($data_pegawai);
        if($email=="guru@gmail.com" && $password=="guru"){
            return view('pages.guru.guruHome');
        }else if($email=="murid@gmail.com" && $password=="murid"){

            return view("pages.murid.muridHome");
        }
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }
    public function goToLandingPage(Request $request)
    {
        $param = [];
        return view('pages.essential.landing',$param);
    }
}
