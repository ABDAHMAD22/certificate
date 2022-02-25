<?php

namespace App\Http\Middleware;

use Closure;

class HasAdsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::guard('editor')->check() && !\Auth::guard('editor')->user()->hasAds()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
