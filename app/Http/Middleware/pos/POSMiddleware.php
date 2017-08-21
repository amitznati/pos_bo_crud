<?php

namespace App\Http\Middleware\pos;

use Illuminate\Support\Facades\Auth;
use Closure;

class POSMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login');
            }
        }

        return $next($request);
    }
}
