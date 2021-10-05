<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssentialController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
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
