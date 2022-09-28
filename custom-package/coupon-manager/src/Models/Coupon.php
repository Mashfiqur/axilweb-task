<?php

namespace Mashfiqdev\CouponManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    /**
     * Provide soft delete related functionality
     */
    use SoftDeletes;

    protected $guarded = [];

    public function assignments(){
        return $this->hasMany(CouponAssignee::class);
    }
    
}
