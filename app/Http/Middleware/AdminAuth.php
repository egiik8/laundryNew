<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            // Admin sudah login, izinkan akses ke menu
            return $next($request);
        }

        // Admin belum login, arahkan mereka ke halaman login
        return redirect()->route('admin.loginForm');
    }
}
