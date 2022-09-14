<?php

namespace App\Http\Middleware\School;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FirstStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('school'))
        return redirect()->route('director.school.firstpage')->with('warning','الرجاء تعبئة البيانات في الصفحة');
        return $next($request);
    }
}
