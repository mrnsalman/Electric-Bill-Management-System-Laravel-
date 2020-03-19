<?php

namespace App\Http\middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperNAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role == 'super' || Auth::user()->role == 'admin'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
