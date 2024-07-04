<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Logincheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->all(),session()->getId(),session()->all());
        if (Auth::check()) {
            // User is authenticated, proceed with the request
            return $next($request);
        }

        // User is not authenticated, redirect to login page
        return redirect('/');
    }
}
