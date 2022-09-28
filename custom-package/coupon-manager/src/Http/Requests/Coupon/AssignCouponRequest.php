<?php

namespace Mashfiqdev\CouponManager\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class AssignCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon_id' => [
                'required',
                'integer',
                'exists:coupons,id'
            ],
            'departments' => [
                'sometimes',
                'array'
            ],
            'courses' => [
                'sometimes',
                'array'
            ],
            'departments.*' => [
                'integer',
                'sometimes',
                'exists:departments,id'
            ],
            'courses.*' => [
                'integer',
                'sometimes',
                'exists:courses,id'
            ],
        ];
    }

    
}
