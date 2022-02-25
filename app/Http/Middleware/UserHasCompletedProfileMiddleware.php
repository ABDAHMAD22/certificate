<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserHasCompletedProfileMiddleware
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
        if (\Auth::guard('web')->check() && !\Auth::guard('web')->user()->is_completed) {
            return redirect()->route('user.profile');
        }

        return $next($request);
    }
}
