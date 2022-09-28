<?php

namespace Mashfiqdev\CouponManager\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoupon extends FormRequest
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

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'fixed_amount'   => $this->type == 'fixed' ? $this->fixed_amount : null,
            'percentage_off' => $this->type == 'percentage' ? $this->percentage_off : null,
        ]);
    }
}
