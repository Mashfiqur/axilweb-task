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
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function course(){
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}