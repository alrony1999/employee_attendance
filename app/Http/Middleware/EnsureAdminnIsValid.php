<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdminnIsValid
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->u_type == 'A') {
            return $next($request);
        } else {
            session()->flush();
            return redirect('/');
        }
    }
}
