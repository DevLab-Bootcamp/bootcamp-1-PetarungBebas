<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

use function App\Helpers\errorResponse;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
        $user = JWTAuth::parseToken()->authenticate();}catch(\Exception $e) {
            return errorResponse('Unauthorized',[], 401);
        }
        if (! $user || ! in_array($user->role, $roles)) {
            return errorResponse('Forbidden',[], 403);
        }

        return $next($request);
    }
}
