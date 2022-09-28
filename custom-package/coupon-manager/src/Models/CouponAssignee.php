<?php
 
namespace Mashfiqdev\CouponManager\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class CouponAssignee extends Model
{
    protected $guarded = [];

    protected $table = "coupon_assignees";
    
    /**
     * Get the parent couponable model (Department or Course).
     */
    public function couponable()
    {
        return $this->morphTo();
    }
}