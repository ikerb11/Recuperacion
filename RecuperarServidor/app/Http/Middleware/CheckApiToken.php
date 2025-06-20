<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('X-API-KEY') !== '123456') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
