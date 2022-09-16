<?php

namespace App\Models;

use App\Models\OldDirection;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'level',
        'building_type',
        'work_time',
        'gender',
        'teachers_num',
        'students_num',
        'agents_num',
        'mentors_num',
        'activity_pioneers_num',
        'exam_preparers_num',
        'computer_laboratories_num',
        'street',
        'region',
        'admins_num',
        'school_rating_id',
        'direction_id',
        'old_direction_id',
        'director_id',
        'ministerial_number',
        'status'

    ];


    /**
     * The sspecializations that belong to the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class, 'school_teacher' ,'school_id','specialization_id')->withPivot(['teachers_num']);
    }

    /**
     * Get the rating that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rating(): BelongsTo
    {
        return $this->belongsTo(SchoolRatings::class, 'school_rating_id', 'id');
    }


    /**
     * Get the direction that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }
    /**
     * Get the direction that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function old_direction(): BelongsTo
    {
        return $this->belongsTo(OldDirection::class, 'old_direction_id', 'id');
    }


    /**
     * Get the director that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class, 'director_id', 'id');
    }

    public function scopeSearch($query , $value)
    {
        if(request()->search)
        return $query->when($value , function() use($value , $query){

            $query->where('name','LIKE','%'.$value.'%');

        });


    }

    public function scopeSearchDirection($query,$id,$value)
    {
            if(request()->search)
           return $query->where('name','LIKE','%'.$value.'%')->where('direction_id',$id);


    }
}
