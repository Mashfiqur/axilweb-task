<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mashfiqdev\CouponManager\Models\CouponAssignee;

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
     * Get the course's coupon.
     */
    public function course_coupon()
    {
        return $this->hasOne(CouponAssignee::class, 'course_id', 'id');
    }

}
