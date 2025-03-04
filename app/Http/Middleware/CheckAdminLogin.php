<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login.form')->with('error', 'You must log in first.');
        }

        return $next($request);
    }
}

