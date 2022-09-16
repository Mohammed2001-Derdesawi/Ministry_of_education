<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Direction;
use App\Models\Supervisor;
use App\Models\OldDirection;
use Illuminate\Http\Request;
use App\Models\SchoolRatings;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    //   مكتب التعليم

   public function main()
   {

    $direction=OldDirection::withCount('supervisors as super_count')->maleSupervisors()->femaleSupervisors()->withCount('schools')->withSum('schools as sh_teachers_total','teachers_num')->withSum('schools as sh_students_total','students_num')->findOrFail(auth()->guard('office')->user()->old_direction_id);

    $school_ratings=$this->getSchoolRatings($direction);



    return view('Office.Educationoffice',['direction'=>$direction,'school_ratings'=>$school_ratings]);
   }

   public function OneOffice($id)
   {
    $direction=Direction::withCount(['schools','supervisors as super_count'])->maleSupervisors()->femaleSupervisors()->findOrFail($id);
    return view('Administration.one-office',['direction'=>$direction]);
   }

   public function alloffices(){



     $school_ratings=SchoolRatings::MaleTeachers(null)->femaleTeachers(null)->maleStudents(null)->femaleStudents(null)->withCount('schools_females')->withCount('schools_males')->get();
     $male_supervisors=Supervisor::countGender('male');
     $female_supervisors=Supervisor::countGender('female');


     return view('Administration.offices',['school_ratings'=>$school_ratings,'male_supervisors'=>$male_supervisors,'female_supervisors'=>$female_supervisors]);
   }

   protected function getSchoolRatings($direction)
   {
    return  $school_ratings=SchoolRatings::withCount([
        'schools_males'=>function ($q) use ($direction)
        {
            return $q->where('old_direction_id',$direction->id);

        },
        'schools_females'=>function ($q) use ($direction)
        {
            return $q->where('old_direction_id',$direction->id);

        },
    ]

)

->maleTeachers($direction,'old_direction_id')
 ->femaleTeachers($direction,'old_direction_id')
 ->maleStudents($direction,'old_direction_id')
 ->femaleStudents($direction,'old_direction_id')
->get();


   }

   public function logout()
   {
    Auth::guard('office')->logout();
    return redirect()->route('login');
   }





}
