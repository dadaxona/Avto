<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Test2
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
        if (!Session()->has('ID')) {
           return redirect('/')->with('fail', 'Notogri kirishga urinyapsiz.');
        }
        return $next($request);
    }
}
