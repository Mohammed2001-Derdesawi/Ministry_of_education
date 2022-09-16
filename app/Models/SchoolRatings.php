<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolRatings extends Model
{
    use HasFactory;
    protected $fillable=['name'];


    /**
     * Get all of the schools_males for the SchoolRatings
     *
     * @return \Illuminate\DatSchoolloquent\Relations\HasMany
     */
    public function schools_males(): HasMany
    {
        return $this->hasMany(School::class, 'school_rating_id', 'id')->where('gender','male');
    }




    /**
     * Get all of the schools_males for the SchoolRatings
     *
     * @return \Illuminate\DatSchoolloquent\Relations\HasMany
     */
    public function schools_females(): HasMany
    {
        return $this->hasMany(School::class, 'school_rating_id', 'id')->where('gender','female');
    }

    public function scopeMaleTeachers($query,$direction,$col='direction_id')
    {
         if(!$direction)
         {
            return $query->withSum('schools_males','teachers_num');
         }
        return $query->withSum(['schools_males' => function($q) use ($direction,$col){
            return $q->where($col,$direction->id);

        }],'teachers_num');
    }

    public function scopeFemaleTeachers($query,$direction,$col='direction_id')
    {
        if(!$direction)
        {
           return $query->withSum('schools_females','teachers_num');
        }
        return $query->withSum(['schools_females' => function($q) use ($direction,$col){
            return $q->where($col,$direction->id);

        }],'teachers_num');
    }


    public function scopeFemaleStudents($query,$direction,$col='direction_id')
    {
        if(!$direction)
        {
           return $query->withSum('schools_females','students_num');
        }
        return $query->withSum(['schools_females' => function($q) use ($direction,$col){
            return $q->where($col,$direction->id);

        }],'students_num');
    }


    public function scopeMaleStudents($query,$direction,$col='direction_id')
    {
        if(!$direction)
        {
           return $query->withSum('schools_males','students_num');
        }
        return $query->withSum(['schools_males' => function($q) use ($direction,$col){
            return $q->where($col,$direction->id);

        }],'students_num');
    }










}
