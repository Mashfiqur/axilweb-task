<?php

namespace Mashfiqdev\CouponManager\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoupon extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:1'
            ],
            'code' => [
                'required',
                'string',
                'unique:coupons,code'
            ],
            'type' => [
                'required',
                'string',
                'in:fixed,percentage'
            ],
            'fixed_amount' => [
                'sometimes',
                'nullable',
                'numeric'
            ],
            'percentage_off' => [
                'sometimes',
                'nullable',
                'numeric'
            ],
            'expiration_date' => [
                'sometimes',
                'nullable',
                'date',
                'after:yesterday'
            ],
        ];
    }
}
