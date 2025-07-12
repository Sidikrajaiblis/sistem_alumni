<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'banned') {
            Auth::logout();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun anda di-banned. Hubungi admin.',
            ]);
        }

        return $next($request);
    }
}

