<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Locale
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
        $lang = $request -> input('lang');
        if ($lang != null) {
            $request -> session() -> put('lang', $lang);
        }
        if ($request -> session() -> has('lang')) {
            App::setLocale($request -> session() -> get('lang'));
        }

        return $next($request);
    }
}
