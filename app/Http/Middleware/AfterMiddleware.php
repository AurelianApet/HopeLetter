<?php namespace App\Http\Middleware;

use Closure;

class AfterMiddleware implements Middleware {

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Perform action

        return $response;
    }
}