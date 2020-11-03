<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
            
            if(Auth::user()->tipo == 1 || Auth::user()->tipo == 5)
            {
              return $next($request);
            }
            
          }
  
  
          return redirect('/home');
  
    }
}
