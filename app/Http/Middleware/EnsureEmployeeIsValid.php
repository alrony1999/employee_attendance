<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class EnsureEmployeeIsValid
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            session()->flush();
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
