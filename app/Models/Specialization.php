<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable=['specialization'];


    /**
     * The schools that belong to the Specialization
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'school_teacher','specialization_id','school_id')->withPivot(['teachers_num']);
    }
}
