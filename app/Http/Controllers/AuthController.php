<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Director;
use App\Models\Direction;
use Illuminate\Http\Request;
use App\Models\Administration;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\OldDirection;

class AuthController extends Controller
{
    public function signupPage()
    {

        $directions=OldDirection::select('id','direction')->get();

        return view('Auth.signup',['directions'=>$directions]);
    }
    public function signup(SignupRequest $request)
    {
        $auth=[
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ];

        switch($request->type){
            case 'director':
                $class=Director::class;
                break;
                case 'administrations':

                 $class=Administration::class;
                 break;
                 case 'office':
                    $auth['old_direction_id']=$request->direction;
                    $class=Office::class;
                    break;

        }


        $class::create($auth);


        return redirect()->route('login')->with('success','تم تسجيل الدخول بنجاح ');

    }
    public function loginPage()
    {


        return view('Auth.login');
    }
    public function login(loginRequest $request)
    {
        switch($request->type){
            case 'director':
                $guard='director';
                break;
                case 'administration':
                 $guard='admin';
                 break;
                 case 'office':
                    $guard='office';
                    break;

        }


        if(Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password]))
        {

            if($guard=='director')
            return redirect()->route('director.school.firstpage');
            elseif($guard=='admin')
            return redirect()->route('admin.offices');
            elseif ($guard=='office')
            return redirect()->route('office.main');
        }

        return redirect()->back()->with('faild','كلمة المرور غير صحيحة');



    }


}
