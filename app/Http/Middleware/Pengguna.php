<?php

namespace App\Http\Middleware;

use Closure;

class Pengguna
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
        if (auth()->guard('pegguna')->check()) {
            return $next($request);
        }

        return redirect()->route('/');
    }
}
