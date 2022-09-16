<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direction extends Model
{
    use HasFactory;

     protected $fillable=['direction'];
     protected $appends = ['ratings'];

     /**
      * Get all of the schools for the Direction
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function schools(): HasMany
     {
         return $this->hasMany(School::class, 'direction_id', 'id');
     }
      public function supervisors()
      {
        return $this->hasMany(Supervisor::class,'direction_id','id');
      }

      public function scopeMaleSupervisors($query)
      {
       return  $query->withCount(['supervisors as count_super_male'=>function ($q){
              return $q->where('gender','male');
       }]);
      }


      public function scopeFemaleSupervisors($query)
      {
       return  $query->withCount(['supervisors as count_super_female'=>function ($q){
              return $q->where('gender','female');
       }]);
      }



      public function getRatingsAttribute()
      {


         return  $school_ratings=SchoolRatings::withCount([
             'schools_males'=>function ($q)
             {
                 return $q->where('direction_id',$this->id);

             },
             'schools_females'=>function ($q)
             {
                 return $q->where('direction_id',$this->id);

             },
         ]

     )

     ->maleTeachers($this)
      ->femaleTeachers($this)
      ->maleStudents($this)
      ->femaleStudents($this)
     ->get();




      }

      public function schools_males()
      {
        return $this->hasMany(School::class, 'direction_id', 'id')->where('gender','male');

      }
      public function schools_females()
      {
        return $this->hasMany(School::class, 'direction_id', 'id')->where('gender','female');

      }


      public function scopeCountAdminsmale($query)
      {
        return $query->withSum('schools_males as admins_male','admins_num');

      }
      public function scopeCountAdminsfemale($query)
      {
        return $query->withSum('schools_females as admins_female','admins_num');

      }

      public function scopeCountTeachersmale($query)
      {
        return $query->withSum('schools_males as teachers_male','teachers_num');

      }
      public function scopeCountTeachersfemale($query)
      {
        return $query->withSum('schools_females as teachers_female','teachers_num');

      }

      public function scopeCountStudentsmale($query)
      {
        return $query->withSum('schools_males as students_male','students_num');

      }
      public function scopeCountStudentsfemale($query)
      {
        return $query->withSum('schools_females as students_female','students_num');

      }

      public function scopeAgents($query)
      {
        return $query->withSum('schools as agnets_num','agents_num');
      }
      public function scopeActivitys($query)
      {
        return $query->withSum('schools as activites_num','activity_pioneers_num');
      }
      public function scopeMentors($query)
      {
        return $query->withSum('schools as mentors_num','mentors_num');
      }







}
