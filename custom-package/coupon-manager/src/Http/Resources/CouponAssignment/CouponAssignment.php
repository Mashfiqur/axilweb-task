<?php

namespace Mashfiqdev\CouponManager\Http\Resources\CouponAssignment;

use App\Http\Resources\Course\Course;
use App\Http\Resources\Department\Department;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponAssignment extends JsonResource {

    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id'                    => $this->id,
            'department'            => $this->department_id ? new Department($this->department) : null,
            'course'                => $this->course_id ? new Course($this->course) : null,
        ];
    }

}
