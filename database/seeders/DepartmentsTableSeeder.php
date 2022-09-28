<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    protected $data = [
        [
            'name'          => 'Electrical & Computer Engineering',
            'abbreviation'  => 'ECE'
        ],
        [
            'name'          => 'Economics',
            'abbreviation'  => 'ECO'
        ],
        [
            'name'          => 'English',
            'abbreviation'  => 'ENG'
        ],
        [
            'name'          => 'Mathematics',
            'abbreviation'  => 'MAT'
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert($this->data);
    }
}
