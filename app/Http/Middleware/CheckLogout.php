<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogout
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
        $tempuser=$request->session()->get('user_logged', 'default');

        if(Session::has('user_logged'))
        {
            if($tempuser->pengguna_peran=="0"){
                return redirect('/guru');

            }else{
                return redirect('/murid');
            }

        }
        else {
            # Dikembalikan ke login page apabila belum login
            return $next($request);
            // return redirect('/');
        }
    }
}
