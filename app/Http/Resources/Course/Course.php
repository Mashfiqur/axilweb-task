<?php

namespace App\Http\Resources\Course;

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
            'price'                 => $this->price,
        ];
    }

}