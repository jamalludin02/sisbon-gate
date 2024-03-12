<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SPV
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'SPV') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role == 'GUEST') {
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
