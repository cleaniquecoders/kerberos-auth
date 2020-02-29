<?php

namespace CleaniqueCoders\KerberosAuth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KerberosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (! $request->hasHeader(config('kerberos.header_key')) || ! isKerberosEnabled()) {
            return $next($request);
        }

        if (! auth()->user()) {
            auth()->login(getKerberosUser());
        }

        return $next($request);
    }
}
