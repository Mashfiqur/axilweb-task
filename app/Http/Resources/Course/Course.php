<?php

namespace App\Http\Resources\Course;

use App\Models\Course as CourseModel;
use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource {

    
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
            'code'                  => $this->code,
            'department'            => [
                'id'                => $this->department->id,
                'name'              => $this->department->name
            ],
            'price'                 => $this->getPrice(),
        ];
    }

    protected function getPrice(){
        $coupon = null;
        $price = null;

        if($this->department->department_coupon){
            $coupon = $this->department->department_coupon->coupon;
        }
        if($this->course_coupon){
            $coupon = $this->course_coupon->coupon;
        }
        if($coupon && $coupon->expiration_date <= date('Y-m-d')){
            $price = $coupon->type = "fixed" ? ($this->price - $coupon->fixed_amount) 
                         : $this->price - ($this->price * floatval($coupon->percentage_off)); 
        }

        return $price ? $price : $this->price;
    }

}
