<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $raw_locale = $request->session()->get('locale');
        if(in_array($raw_locale, config('app.locales'))){//Если в сессии значение валидное
            $locale = $raw_locale;
        }else{
            $locale = config('app.locale');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
