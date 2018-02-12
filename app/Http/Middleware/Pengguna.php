<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pengguna
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'pengguna')
    {
        if (Auth::guard('pengguna')->check()) {
            return $next($request);
        }

        return redirect('/')->with('success', 'Anda Harus  login terlebih dahulu, untuk mengakses halaman tersebut. !');
    }
}
