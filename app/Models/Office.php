<?php

namespace App\Models;

use App\Models\OldDirection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Office extends Authenticatable
{
    use HasFactory;
    protected $fillable=['email','password','old_direction_id'];

    /**
     * Get the direction that owns the Office
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function old_direction(): BelongsTo
    {
        return $this->belongsTo(OldDirection::class, 'old_direction_id', 'id');
    }

}
