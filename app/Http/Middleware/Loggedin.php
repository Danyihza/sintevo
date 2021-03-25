<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Loggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->get('login-data')) {
            return redirect('login');
        }
        return $next($request);
    }
}
