<?php

namespace App\Http\Middleware;

use Closure;

class KtraDangNhap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->exists("user"))
            return $next($request);
        else if (isset($_COOKIE['user'])){
            session()->put("user", unserialize($_COOKIE['user'])); //lưu cookie vào session
            return $next($request);
        }
        else
            return redirect()->route("login");
    }
}
