<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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
        if (Session()->has('loginID') && (url('/login')==$request->url() || url('/registration')==$request->url())) {
            return back();
        }
        // return $next($request);
        // if (Session()->has('ID') && (url('/test2')==$request->url() || url('/test')==$request->url())) {
        //     return back();
        // }
        // return $next($request);
    }
}
