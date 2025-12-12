<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstructorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // allow only logged‑in instructors
        if (!auth()->check() || !auth()->user()->isInstructor()) {
            abort(403, 'Only instructors can access this page.');
        }

        return $next($request);
    }
}
