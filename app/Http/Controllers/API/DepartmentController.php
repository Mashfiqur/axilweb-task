<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Department\DepartmentCollection;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentModel;

    public function __construct(Department $departmentModel)
    {
        $this->departmentModel = $departmentModel;
    }

    public function index(){
        return $this->sendResponse([
            'departments' => new DepartmentCollection($this->departmentModel->with(['courses'])->get())
        ]);
    }

    public function store(){

    }

    public function show($id){
        return $this->departmentModel->find($id);
    }   

    public function update(){
        
    }

    public function destroy(){
        
    }

}
