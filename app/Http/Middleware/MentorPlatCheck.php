<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MentorPlatCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check the user's role (assuming 'LA_Role' is a valid attribute)
            if ($user->LA_Role == 0 || $user->LA_Role == 2 || $user->LA_Role == 3) {
                return $next($request); // Allow the request to proceed
            }
        }

        // Redirect to the login page with an explanation
        return redirect('login')->with('fail', 'You do not have the required privileges.');
    }
}
