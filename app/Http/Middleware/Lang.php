<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
        if(session()->has('lang'))
        {
            \App::setLocale(session('lang'));

        }
        else{
            \App::setLocale(session('en'));
        }
        return $next($request);
    }
}
