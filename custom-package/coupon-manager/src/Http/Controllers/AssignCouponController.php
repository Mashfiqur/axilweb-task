<?php

namespace Mashfiqdev\CouponManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        try{
            if($data = $request->validated()){
                $this->couponAssigneeModel->where('coupon_id', $data['coupon_id'])->delete();

                $couponAssignments = [];
    
                foreach($data['departments'] as $department){
                    array_push($couponAssignments, [
                        'coupon_id' => $data['coupon_id'],
                        'department_id' => $department,
                        'course_id' => null
                    ]);
                }
                foreach($data['courses'] as $course){
                    array_push($couponAssignments, [
                        'coupon_id' => $data['coupon_id'],
                        'department_id' => null,
                        'course_id' => $course
                    ]);
                }
                

                if(count($couponAssignments)){
                    $success = $this->couponAssigneeModel->insert($couponAssignments);
                    DB::commit();

                    return $this->sendResponse([
                        'data' => $success
                    ]);
                }
            }

        }
        catch(\Exception $e){
            DB::rollBack();
            return $this->sendError([$e->getMessage()]);
        }
        
    }
}