<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
        if(!\Auth::check()){
            ?>
            <script>
                alert ('You must Log In');
            </script>
            <?php
            return view('auth.login');
        }
        
        return $next($request);
    }
}
