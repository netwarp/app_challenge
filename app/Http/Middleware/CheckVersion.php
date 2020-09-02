<?php

namespace App\Http\Middleware;

use Closure;

class CheckVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('app.version') > 2.4) {
            return $next($request);
        }
        else {
            return response()->json('version < 2.4');
        }
    }
}
