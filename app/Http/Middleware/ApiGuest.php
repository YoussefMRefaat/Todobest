<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiGuest
{

    /**
     * Check if the user is a guest
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\JsonResponse
    {
        if(Auth::guard('sanctum')->user()){
            abort(403 , 'Already logged in');
        }
        return $next($request);
    }
}
