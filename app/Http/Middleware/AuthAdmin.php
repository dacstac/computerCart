<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('startLogin')->with('error', "Please log in to access this page.");
        } else if (auth()->check() && auth()->user()->type != 0) {
            return redirect()->route('startLogin')->with('error', "You don't have permissions to enter in this page.");
        }
        return $next($request);
    }
}
