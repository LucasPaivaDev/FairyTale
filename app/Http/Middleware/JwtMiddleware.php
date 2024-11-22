<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\UnauthorizedException;

class JwtMiddleware
{
/** @return Response|RedirectResponse */
public function handle(Request $request, Closure $next)
{
    try {
        JWTAuth::parseToken()->authenticate();
    } catch (\Exception $e) {
        throw new UnauthorizedException('User Unauthorized');
    }

    return $next($request);
}
}
