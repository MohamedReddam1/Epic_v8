<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class userformateuruser
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
        if (!Auth::check() || (Auth::user()->role !== User::FORMATEUR_ROLE && Auth::user()->role !== User::USER_ROLE)) {
            return redirect('/login');
        }
        return $next($request);
    }
}