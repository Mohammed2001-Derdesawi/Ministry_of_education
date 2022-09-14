<?php

namespace App\Http\Controllers;

use App\Http\Requests\School\AssignSchoolRequest;
use App\Http\Requests\School\AssignToOfficeRequest;
use App\Http\Requests\School\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\School\FirstStepRequest;
use App\Http\Requests\School\SecondRequest;
use App\Http\Requests\School\ThirdRequest;
use App\Models\Direction;
use App\Models\School;
use App\Models\SchoolRatings;
use App\Models\Specialization;

use function PHPUnit\Framework\returnSelf;

class SchoolController extends Controller
{
    // للمدرسة
     public function create(CreateRequest $request)
     {
        $school=Session::get('school');
        $countTeachers=0;
        $teachers=[];
        foreach($request->specializations as $key=>$num)
        {
            $countTeachers+=$num;
            if($num!=null)
            $teachers[]=[
                "specialization_id"=>$key,"teachers_num"=>$num
            ];
        }
        if($school["teachers_num"]!=$countTeachers)
        return redirect()->back()->with('warning',' يجب أن يكون عدد المعلمين في التخصصات يساوي مجموع المعلمين الكلي والذي يساوي'.$school["teachers_num"]);
        $school=array_merge($school,[
            'region'=>$request->region,
            'street'=>$request->street
        ]);

       $school=Auth::guard('director')->user()->school()->create($school);
       $school->specializations()->attach($teachers);
       Auth::guard('director')->logout();
       return redirect()->route('login')->with('success','شكرا لك تم حفظ بيانات المدرسة');



     }
     public function firstStepPage(){
        $directions=Direction::select('id','direction')->get();
        $schoolratings=SchoolRatings::select('id','name')->get();
         return view('Director.first',['directions'=>$directions,'schoolratings'=>$schoolratings]);


     }
     public function firstStep(FirstStepRequest $request){

        Auth::guard('director')->user()->update([
            'name'=>$request->name
        ]);
        Session::put('school',[
            'name'=>$request->name,
            'ministerial_number'=>$request->ministerial_number,
            'gender'=>$request->gender,
            'direction_id'=>$request->direction,
            'school_rating_id'=>$request->school_rating
        ]);

        return redirect()->route('director.school.secondpage');




     }

     public function secondStepPage()
     {


       return view('Director.‏‏second');
     }
     public function secondStep(SecondRequest $request)
     {
        $school=Session::get('school');
        $school=array_merge($school,[
            'level'=>$request->level,
            'building_type'=>$request->building,
            'work_time'=>$request->time,
            'teachers_num'=>$request->teachers,
            'students_num'=>$request->students,
            'agents_num'=>$request->agents,
        ]);


        Session::put('school',$school);
        return redirect()->route('director.school.thirdpage');



     }

     public function thirdStepPage(){



        return view('Director.third');


    }
     public function thirdStep(ThirdRequest $request){

        $school=Session::get('school');
        $school=array_merge($school,[

            'mentors_num'=>$request->mentors,
            'activity_pioneers_num'=>$request->activity_pioneers,
            'admins_num'=>$request->admins,
            'exam_preparers_num'=>$request->exam_preparers,
            'computer_laboratories_num'=>$request->computer_laboratories,

        ]);
        Session::put('school',$school);
        return redirect()->route('director.school.fourpage');


     }

     public function fourStepPage()
     {
        $specializations=Specialization::select('id','specialization')->get();
        return view('Director.teachers',['specializations'=>$specializations]);
     }


     public function AssignToOffice(AssignSchoolRequest $request)
     {
        foreach ($request->schools as $school)
        {

            School::findOrFail($school)->update([
                'direction_id'=>$request->directions
            ]);
        }

        return redirect()->route('office.schools')->with('success','تم نقل المدرسة بنجاح');

     }

     public function allSchools()
     {
      $direction=Auth::guard('office')->user()->direction;


      $schools=School::where('direction_id',$direction->id)->with('direction','director')->search(request()->search)->paginate(10);






      return view('Office.allSchools',['schools'=>$schools,'directions'=>Direction::select('id','direction')->get()]);

     }

     public function show($id)
     {
        $school=School::with('director:id,name','rating','direction:id,direction')->findOrFail($id);
        $specializations=Specialization::with(['schools'=>function($q) use($school){
            return $q->where('school_id',$school->id);
        }])->get();
        $directions=Direction::select('id','direction')->get();
        return view('Administration.school-details',['specializations'=>$specializations,'school'=>$school,'directions'=>$directions]);
     }

     public function changeStatus($id)
     {
        $school=School::findOrFail($id);
        $school->update([
            'status'=>!$school->status
        ]);

        return redirect()->route('admin.school.show',$school->id)->with('success','تم تغيير حالة المدرسة بنجاح');
     }

     public function AssignSchoolToOffice(AssignToOfficeRequest $request,$id)
     {
         $school=School::findOrFail($id);
         $school->update([
            'direction_id'=>$request->direction
         ]);

         return redirect()->route('admin.school.show',$school->id)->with('success','تم  نقل المدرسة بنجاح');


     }


}
