<?php

namespace App\Models;

use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supervisor extends Model
{
    use HasFactory;
    protected $fillable=['name','direction_id','specialization_id','civil','gender'];

    /**
     * Get the office that owns the Supervisor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    /**
     * Get the specialization that owns the Supervisor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }
    public function scopeSearch($query , $value)
    {
        if(request()->search)
        return $query->when($value , function() use($value , $query){

            $query->where('name','LIKE','%'.$value.'%')
            ->orwhere('civil','LIKE','%'.$value.'%')
            ->orwhereHas('specialization',function ($q) use ($value){

                   return $q->where('specialization','LIKE','%'.$value.'%');
                });


        });


    }
}
