<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        return $next($request);
    }
}