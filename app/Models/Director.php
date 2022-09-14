<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Director extends Authenticatable
{
    use HasFactory;
    protected $fillable=['email','password','name'];


    /**
     * Get the schools associated with the Director
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school(): HasOne
    {
        return $this->hasOne(School::class, 'director_id', 'id');
    }

}
