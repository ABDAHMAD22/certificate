<?php

namespace App\Http\Middleware;

use App\Editor;
use Closure;

class ActiveEditorMiddleware
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
        if (\Auth::guard('editor')->check() && \Auth::guard('editor')->user()->status != Editor::STATUS_ACTIVE) {
            \Auth::guard('editor')->logout();
            return redirect()->route('editor.login');
        }

        return $next($request);
    }
}
