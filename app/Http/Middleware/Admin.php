<?php

namespace App\Http\Middleware;

use Closure;
use auth;
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
        $user = Auth::user();
        if($user->role == 'admin')
        {
        return $next($request);
    }
    return redirect('/');
    }
    
}
