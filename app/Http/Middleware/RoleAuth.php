<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        $selectedUserType = session('selected_user_type');

        if (Auth()->user()->usertype=='admin')
        {
        return $next($request);
        }

        if ($selectedUserType=='daie')
        {
        return $next($request);
        }

        if ($selectedUserType=='mentor')
        {
        return $next($request);
        }

        if ($selectedUserType=='mualaf')
        {
        return $next($request);
        }
        
        abort(401);
    }
}
