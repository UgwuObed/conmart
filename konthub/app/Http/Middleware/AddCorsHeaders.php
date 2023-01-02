<?php

namespace App\Http\Middleware;
use Barryvdh\Cors\Cors;

use Closure;

class AddCorsHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'content-type');
        return $response;
    }
}