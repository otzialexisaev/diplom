<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('/user/index');
        }

        return $next($request);
    }
}
