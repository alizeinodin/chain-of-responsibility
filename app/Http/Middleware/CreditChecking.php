<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreditChecking
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!($request->user()->credit >= $request->product->cost)) {
            return json_response([
                'message' => 'Not enough credit, please charge it!'
            ], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
