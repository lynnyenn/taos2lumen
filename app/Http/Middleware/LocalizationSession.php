<?php

namespace App\Http\Middleware;

use Closure;

class LocalizationSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //public $locates = ['en','tw'];
    public function handle($request, Closure $next)
    {
        if(!\Session::has('locale'))
        {
           \Session::put('locale', 'en');
        }

        app('translator')->setLocale(\Session::get('locale'));
        return $next($request);
    }
    //public function getlocates()
}
