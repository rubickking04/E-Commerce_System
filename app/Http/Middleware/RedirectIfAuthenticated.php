<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if ($request->is('admin/*')) {
            if (Auth::guard('admin')->check()) {
                return route('admin.home');
            }
        } elseif ($request->is('my-store/*')) {
            if (Auth::guard('store')->check()) {
                return route('store.home');
            }
        } elseif (Auth::guard($guards)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
