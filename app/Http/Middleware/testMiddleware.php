<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class testMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $blockedIPs = BlockedIP::pluck('ip')->toArray();

        if (in_array($request->ip(), $blockedIPs)) {
            return response()->json([
                'success' => false,
                'message' => 'Your IP address has been blocked. Please contact Niobi support for assistance.'
            ], 403);
        }
        return $next($request);
    }
}
