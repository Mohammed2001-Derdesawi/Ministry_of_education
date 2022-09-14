<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Specialization;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    // للإدارة

   public function allsupervisors(){
     $supervisors=Supervisor::search(request()->search)->paginate(10);
     $directions=Direction::get();
     return view('Administration.supervisors',['supervisors'=>$supervisors,'directions'=>$directions]);
   }

   public function showdirection($id)
   {
      $direction=Direction::withCount('schools')
      ->countAdminsmale()
      ->countAdminsfemale()
      ->countTeachersmale()
      ->countTeachersfemale()
      ->countStudentsmale()
      ->countStudentsfemale()
      ->agents()
      ->activitys()
      ->mentors()
      ->findorFail($id);
      $schools=$direction->schools()->searchDirection($direction->id,request()->search)->paginate(10);



       return view('Administration.office-details',['direction'=>$direction,'schools'=>$schools]);


   }



}
