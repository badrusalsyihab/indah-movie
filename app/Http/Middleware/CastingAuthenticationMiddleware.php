<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CastingAuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth('casting')->check()) {
            return redirect()->route('frontLogin');
        }

        return $next($request);
    }
}
