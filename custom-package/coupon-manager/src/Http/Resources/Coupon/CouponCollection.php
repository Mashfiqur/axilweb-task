<?php

namespace Mashfiqdev\CouponManager\Http\Resources\Coupon;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CouponCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'data' => $this->collection->toArray(),
        ];
    }
}
