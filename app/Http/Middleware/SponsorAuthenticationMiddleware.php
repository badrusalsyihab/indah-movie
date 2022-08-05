<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SponsorAuthenticationMiddleware
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
        if (!auth('sponsor')->check()) {
            return redirect()->route('frontSponsorLogin');
        }

        return $next($request);
    }
}
