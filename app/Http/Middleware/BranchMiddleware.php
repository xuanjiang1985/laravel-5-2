<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BranchMiddleware
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
        if (Auth::check()) {
            $branch_id = Auth::user()->branch_id;
           return $next($request);
        } else {
            return $next($request);
        }
        
    }
}
