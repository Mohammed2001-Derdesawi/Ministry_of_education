<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OldDirection extends Model
{
    use HasFactory;
    protected $table="old_directions";
    protected $fillable=['direction'];

     /**
      * Get all of the schools for the Direction
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
      public function schools(): HasMany
      {
          return $this->hasMany(School::class, 'old_direction_id', 'id');
      }
       public function supervisors()
       {
         return $this->hasMany(Supervisor::class,'old_direction_id','id');
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
                  return $q->where('old_direction_id',$this->id);

              },
              'schools_females'=>function ($q)
              {
                  return $q->where('old_direction_id',$this->id);

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
         return $this->hasMany(School::class, 'old_direction_id', 'id')->where('gender','male');

       }
       public function schools_females()
       {
         return $this->hasMany(School::class, 'old_direction_id', 'id')->where('gender','female');

       }
}
