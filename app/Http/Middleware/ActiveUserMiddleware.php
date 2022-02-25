<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class ActiveUserMiddleware
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
        if (\Auth::guard('web')->check() && \Auth::guard('web')->user()->status != User::STATUS_ACTIVE) {
            \Auth::logout();
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}
