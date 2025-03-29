<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('admin_logged')) {
            return redirect()->route('admin.login')->with('error', 'Debes iniciar sesión.');
        }

        return $next($request);
    }
}
