<?php

namespace App\Http\Middleware;

use Closure;

class main_mode
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

        if (settings()->status == 0) {
            return redirect("main_mode");
        } else {
            return $next($request);
        }
    }
}
