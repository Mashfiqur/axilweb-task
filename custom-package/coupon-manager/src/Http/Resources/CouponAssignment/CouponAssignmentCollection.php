<?php

namespace Mashfiqdev\CouponManager\Http\Resources\CouponAssignment;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CouponAssignmentCollection extends ResourceCollection {

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
