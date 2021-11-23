<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckMurid
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
            if(getAuthUser()->role_text == 'murid'){
                return $next($request);
            }else{
                return redirect('/guru');
            }

    }
}
