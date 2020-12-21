<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // This makes sure you have an admin role before allowing you to see the page.
        if(!$request->user()->userHasRole($role)){
            abort(403, 'You are not authorized');
        }
        return $next($request);
    }
}
