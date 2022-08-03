<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PegawaiAuthenticationMiddleware
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
        if (!auth('pegawai')->check()) {
            return redirect()->route('frontPegawaiLogin');
        }

        return $next($request);
    }
}
