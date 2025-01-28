<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParseStringToBoolInQueryParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        foreach ($request->query() as $key => $value) {
            if ($value === 'true') {
                $request[$key] = true;
            }
            if ($value === 'false') {
                $request[$key] = false;
            }
        }

        return $next($request);
    }
}
