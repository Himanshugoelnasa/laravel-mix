<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class xHelloWorld
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header('Custom-header', 'x-hello-world');

        return $next();
    }
}
