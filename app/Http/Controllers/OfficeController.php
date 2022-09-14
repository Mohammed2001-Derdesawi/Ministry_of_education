<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\School;
use App\Models\SchoolRatings;
use App\Models\Specialization;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    //   مكتب التعليم

   public function main()
   {

    $direction=Direction::withCount('supervisors as super_count')->maleSupervisors()->femaleSupervisors()->withCount('schools')->withSum('schools as sh_teachers_total','teachers_num')->withSum('schools as sh_students_total','students_num')->findOrFail(auth()->guard('office')->user()->direction_id);

    $school_ratings=$this->getSchoolRatings($direction);


    return view('Office.Educationoffice',['direction'=>$direction,'school_ratings'=>$school_ratings]);
   }

   public function alloffices(){
    $directions=Direction::withCount(['schools','supervisors as super_count'])->maleSupervisors()->femaleSupervisors()->get();


     $count_supervisors=Supervisor::count('id');


     return view('Administration.offices',['directions'=>$directions,'count_supervisors'=>$count_supervisors]);
   }

   protected function getSchoolRatings($direction)
   {
    return  $school_ratings=SchoolRatings::withCount([
        'schools_males'=>function ($q) use ($direction)
        {
            return $q->where('direction_id',$direction->id);

        },
        'schools_females'=>function ($q) use ($direction)
        {
            return $q->where('direction_id',$direction->id);

        },
    ]

)

->maleTeachers($direction)
 ->femaleTeachers($direction)
 ->maleStudents($direction)
 ->femaleStudents($direction)
->get();


   }





}
