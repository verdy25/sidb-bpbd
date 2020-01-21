<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->status, $roles)) {
            return $next($request);
        }

        return redirect('/');
    }
}
