<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role == 'SPV') {
            // return $next($request);
            return redirect()->route('spv.dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'GUEST') {
            // return $next($request);
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
