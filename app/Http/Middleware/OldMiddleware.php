<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ApiResponse;
use Closure;

class OldMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->header('Authorization');
        // if ($request->input('nilai') < 90) {
        //     return response()->json(ApiResponse::unauthorized());
        // }
        return $next($request);
    }
}
