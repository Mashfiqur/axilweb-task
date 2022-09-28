<?php

namespace Mashfiqdev\CouponManager\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mashfiqdev\CouponManager\Http\Requests\Coupon\StoreCoupon;
use Mashfiqdev\CouponManager\Http\Requests\Coupon\UpdateCoupon;
use Mashfiqdev\CouponManager\Http\Resources\Coupon\Coupon as CouponResource;
use Mashfiqdev\CouponManager\Http\Resources\Coupon\CouponCollection;
use Mashfiqdev\CouponManager\Models\Coupon;

class CouponManagerController extends Controller
{
    protected $couponModel;

    public function __construct(Coupon $couponModel)
    {
        $this->couponModel = $couponModel;
    }

    public function index(){
        return $this->sendResponse([
            'coupons' => new CouponCollection($this->couponModel->with([
                'assignments',
                'assignments.department',
                'assignments.course'
            ])->get())
        ]);
    }

    public function store(StoreCoupon $request){
        if($request->validated()){
            return $this->sendResponse([
                'coupon' => new CouponResource(Coupon::create($request->validated() ?? null))
            ]);
        }
    }

    public function show($id){
        return $this->sendResponse([
            'coupon' => new CouponResource($this->couponModel->find($id))
        ]);
    }   

    public function update(UpdateCoupon $request, $id){
        if($request->validated()){
            return $this->sendResponse([
                'coupon' => new CouponResource(Coupon::where('id', $id)->update($request->validated() ?? null))
            ]);
        }
    }

    public function destroy(){
        
    }

}
