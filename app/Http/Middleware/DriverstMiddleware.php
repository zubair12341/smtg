<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DriverstMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->status==1)
        {
            Auth::logout();
            return redirect('/')->with(['error'=>'Your account has been disabled, kindly contact with Administrator. Email: iqra@iqra.edu.pk.']);
        }
        if ($request->user() && $request->user()->user_type === 'Driver') {
            return $next($request);
        }
        

        return redirect('/');
    }
}
