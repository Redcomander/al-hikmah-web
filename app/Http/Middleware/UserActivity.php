<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            $expiresAt = Carbon::now()->addSeconds(15);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
