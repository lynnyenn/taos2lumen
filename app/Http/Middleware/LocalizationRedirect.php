<?php

namespace App\Http\Middleware;

use Closure;

class LocalizationRedirect
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
       //$CurrentLocale = app('translator')->setLocale();
        //echo $uri = $request->path().$CurrentLocale;
        if($request->path() == 'tw'){
            app('translator')->setLocale('tw');
        }else{
            app('translator')->setLocale('en');
        }
        /*
        $locale = $request->segment(1, null);
        if ($redirectUrl = $this->getRedirectionUrl($locale)) {
            // Save any flashed data for redirect
            session()->reflash();
            echo '2';
            echo $redirectUrl =  'http://localhost/twasdf';
            return $this->makeRedirectResponse($redirectUrl, 301);
        }*/
        return $next($request);
    }

}
