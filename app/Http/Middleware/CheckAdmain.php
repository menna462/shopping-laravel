<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmain
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role == 'admin'){

            return $next($request);
        }elseif(Auth::user()&&Auth::user()->role=='user'){
            return redirect()->route("home");
        }else{
            return redirect()->route("login");
        }
    }
}
