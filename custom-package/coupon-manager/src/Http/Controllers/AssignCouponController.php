<?php

namespace Mashfiqdev\CouponManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Mashfiqdev\CouponManager\Http\Requests\Coupon\AssignCouponRequest;
use Mashfiqdev\CouponManager\Models\Coupon;
use Mashfiqdev\CouponManager\Models\CouponAssignee;

class AssignCouponController extends Controller
{
    protected $couponAssigneeModel;

    public function __construct(CouponAssignee $couponAssigneeModel)
    {
        $this->couponAssigneeModel = $couponAssigneeModel;
    }


    public function store(AssignCouponRequest $request){
        if($data = $request->validated()){
            $couponAssignments = [];

            foreach($data['departments'] as $department){
                array_push($couponAssignments, [
                    'coupon_id' => $data['coupon_id'],
                    'department_id' => $department
                ]);
            }
            foreach($data['courses'] as $course){
                array_push($couponAssignments, [
                    'coupon_id' => $data['coupon_id'],
                    'course_id' => $course
                ]);
            }
            
            return $this->sendResponse([
                'data' => $this->couponAssigneeModel->insert($couponAssignments)
            ]);
        }
    }
}