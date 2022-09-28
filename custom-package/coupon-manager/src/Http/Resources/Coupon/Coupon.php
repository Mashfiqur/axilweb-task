<?php

namespace Mashfiqdev\CouponManager\Http\Resources\Coupon;

use Illuminate\Http\Resources\Json\JsonResource;
use Mashfiqdev\CouponManager\Http\Resources\CouponAssignment\CouponAssignmentCollection;

class Coupon extends JsonResource {

    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'name'                  => $this->name,
            'code'                  => $this->code,
            'type'                  => $this->type,
            'fixed_amount'          => $this->fixed_amount,
            'percentage_off'        => $this->percentage_off,
            'expiration_date'       => $this->expiration_date,
            'assignments'           => new CouponAssignmentCollection($this->assignments)
        ];
    }

}
