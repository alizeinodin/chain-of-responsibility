<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductExists
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->product->number >= 0)
            return $next($request);

        return \response()
            ->json([
                'message' => 'This product is not exists!',
            ], Response::HTTP_FORBIDDEN);
    }
}
