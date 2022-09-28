<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;

    /**
     * Provide soft delete related functionality
     */
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Get the department that owns the course.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get all of the department's coupons.
     */
    public function coupons()
    {
        return $this->morphMany(CouponAssignee::class, 'couponable');
    }

    
}
