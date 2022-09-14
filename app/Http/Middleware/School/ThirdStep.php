<?php

namespace App\Http\Middleware\School;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThirdStep
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
        if(!in_array('mentors_num',array_keys(Session::get('school'))))
        return redirect()->route('director.school.thirdpage')->with('warning','الرجاء تعبئة البيانات في الصفحة');

        return $next($request);

    }
}
