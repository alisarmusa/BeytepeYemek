<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->intended('/admin');
        }
        if ($guard == "restaurantadmin" && Auth::guard($guard)->check()) {
            return redirect()->intended('/restaurantadmin');
        }
        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect()->intended('/manager');
        }
        if (Auth::guard($guard)->check()) {
            return redirect()->intended('/home');
        }

        return $next($request);
    }
}
