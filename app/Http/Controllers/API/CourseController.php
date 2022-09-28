<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseCollection;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseModel;

    public function __construct(Course $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    public function index(){
        return $this->sendResponse([
            'courses' => new CourseCollection($this->courseModel->with(['department'])->get())
        ]);
    }

    public function store(){

    }

    public function show($id){
        return $this->courseModel->find($id);
    }   

    public function update(){
        
    }

    public function destroy(){
        
    }

}
