<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('user_logged'))
        {
            return $next($request);
        }
        else {
            # Dikembalikan ke login page apabila belum login
            return response()->view('pages.essential.login');
            // return redirect('/');
        }
    }
}
