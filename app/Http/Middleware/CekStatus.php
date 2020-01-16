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
    public function handle($request, Closure $next)
    {
        $user = User::where('username', $request->username)->first();
        if ($user->status == 'ketua') {
            return redirect('ketua');
        } elseif ($user->status == 'staff') {
            return redirect('staff');
        } elseif ($user->status == 'bidang') {
            return redirect('bidang');
        }
        return $next($request);
    }
}
