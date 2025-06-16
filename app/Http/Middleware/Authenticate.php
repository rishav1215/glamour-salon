<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
      protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login'); // Ensure your login route is named 'login'
        }

        return null;
    }
    /**
     * 
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
