<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ageCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $age = 19;
        if ($age < 18) {
            return redirect()->route('Homepage')->with('success', 'you have not acces View page beacase your age is under 18');
        }

        return $next($request);
    }
}
