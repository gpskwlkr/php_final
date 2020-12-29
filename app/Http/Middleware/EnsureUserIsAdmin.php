<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check() || !Auth::user()->is_admin) {
            return redirect('welcome');
        }

        return $next($request);
    }
}
