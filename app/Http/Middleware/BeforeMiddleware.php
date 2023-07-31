<?php namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware implements Middleware {

    public function handle($request, Closure $next)
    {
        // Perform action

        return $next($request);
    }
}