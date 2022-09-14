<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Office extends Authenticatable
{
    use HasFactory;
    protected $fillable=['email','password','direction_id'];

    /**
     * Get the direction that owns the Office
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

}
