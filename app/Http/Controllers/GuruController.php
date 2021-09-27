<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function goToKelas(Request $request)
    {
        return view('pages.guru.guruHome');
    }
}
