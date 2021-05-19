<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        switch (explode('.', Route::currentRouteName())[0]) {
            case 'admin':
                $route = [
                    1,0
                ];
                break;
            case 'user':
                $route = [2];
                break;
            default:
                $route = [];
                break;
        }
        if (session()->get('login-data')) {            
            if (!in_array(session()->get('login-data')['role'], $route)) {
                return abort(403);
            }
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
