<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmailStatus
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
        //userverify karde ya na=> verify nashode bod session sabt konim ke moshakhs kone anjam nadade va payam neshon bedim
        if ($request->user() && !$request->user()->hasVerifiedEmail()){
            session()->flash('mustVerifyEmail',true);
        }
        return $next($request);
    }
}
