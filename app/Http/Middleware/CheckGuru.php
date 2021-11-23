<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckGuru
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
            if(getAuthUser()->role_text == 'guru'){
                return $next($request);
            }else{
                return redirect('/murid');
            }

    }
}
