<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(Auth()->user()->role_id ==2){
            return $next($request);
        }
        return redirect()->route('admin.dashboard')->with('error', 'Unauthorized Access');
   
    }
}
