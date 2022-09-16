<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SuperVisor\AssignSupervisorRequest;
use App\Http\Requests\SuperVisor\SupervisorCreateRequest;

class SupervisorController extends Controller
{
    // للمشرفين
    public function store(SupervisorCreateRequest $request)
    {

        Supervisor::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'civil'=>$request->civil,
            'specialization_id'=>$request->specilization,
             'old_direction_id'=>Auth::guard('office')->user()->old_direction->id,
             'direction_id'=>null,
         ]);

       return redirect()->route('office.main')->with('success','تم تسجيل المشرف بنجاح');
    }
   public function create()
   {
    $specializations=Specialization::select('id','specialization')->get();
   return view('Office.supervisor-sign',['specializations'=>$specializations]);


   }

   public function AssignSuperVisorTo(AssignSupervisorRequest $request)
   {

    foreach($request->supervisors as $supervisor)
    {
        $supervisor=Supervisor::findOrFail($supervisor);
        $supervisor->update([
            'direction_id'=>$request->direction,
            'old_direction_id'=>null
          ]);

    }


      return redirect()->route('admin.supervisors')->with('success','تم إسناد المشرف بنجاح');
   }

}
