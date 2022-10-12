<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('admin/*')) {
            if (!Auth::guard('admin')->check()) {
                // Alert::toast('Please Login an account first!', 'info');
                return route('admin.login');
            }
        } elseif ($request->is('my-store/*')) {
            if (!Auth::guard('store')->check()) {
                return route('store.login');
            }
        } else if (!Auth::guard('web')->check()) {
            // Alert::toast('Please Login an account first!', 'info');
            return route('login');
        }
    }
}
