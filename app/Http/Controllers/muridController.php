<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridController extends Controller
{
    //Routing untuk
    public function goToKelas(Request $request)
    {
        return view('pages.murid.muridHome');
    }
}
