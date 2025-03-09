<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 2 && Auth::user()->organization_id) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Access Denied.');
    }
}
