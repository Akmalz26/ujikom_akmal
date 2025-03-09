<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman yang sesuai, misalnya 'home' atau 'unauthorized'
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }
}
