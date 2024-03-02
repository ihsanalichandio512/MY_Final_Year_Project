<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Get the user's role
            $userRole = Auth::user()->Role_id; // Assuming 'role' is the field in your User model representing the user's role

            // Check if the user's role is in the allowed roles
            if (in_array($userRole, $roles)) {
                // User has the required role, so proceed with the request
                return $next($request);
            }
        }

        // Redirect the user based on their role
        switch ($userRole) {
            case 1:
                return redirect()->route('admin.home');
                break;
            case 2:
                return redirect()->route('users.home.page');
                break;
            case 3:
                return redirect()->route('showhome');
                break;
            default:
                // If the user doesn't have any of the specified roles, you can redirect them to a generic route or show an error message
                return redirect()->route('login.page')->with('error', 'Unauthorized access');
                break;
        }
    }
}
