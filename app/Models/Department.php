<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mashfiqdev\CouponManager\Models\CouponAssignee;

class Department extends Model
{
    use HasFactory;

    /**
     * Provide soft delete related functionality
     */
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Get the courses for the department.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get all of the department's coupons.
     */
    public function coupons()
    {
        return $this->morphMany(CouponAssignee::class, 'couponable');
    }
}
