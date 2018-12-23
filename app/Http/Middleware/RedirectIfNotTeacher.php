<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="teacher")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('teacher.login'));
        }

        return $next($request);
    }
}
