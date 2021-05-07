<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

class Locale
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
        if ($request->isMethod('get'))
        {
            $segment = $request->segment(1);

            if (! in_array($segment, config('app.locales')))
            {
                $segments = $request->segments();
                $fallback = Cookie::get('lang') ?: config('app.fallback_locale');
                
                array_unshift($segments, $fallback);

                return redirect()->to(implode('/', $segments));
            }

            Cookie::queue(Cookie::make(
                'lang',
                $segment,
                config('cookie.lifetime')
            ));

            app()->setLocale($segment);
        }

        return $next($request);
    }
}
