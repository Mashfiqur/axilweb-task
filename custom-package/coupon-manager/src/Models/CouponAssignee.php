<?php
 
namespace Mashfiqdev\CouponManager\Models;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
 
class CouponAssignee extends Model
{
    protected $guarded = [];

    protected $table = "coupon_assignees";
    
    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
}