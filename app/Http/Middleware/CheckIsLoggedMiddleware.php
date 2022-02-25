<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsLoggedMiddleware
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
        if(\Auth::guard('web')->check() || \Auth::guard('editor')->check()) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
