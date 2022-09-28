<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    protected $data = [
        [
            'name' => 'Programming I',
            'code' => 'CSE101',
            'department_id' => 1,
            'price' => 16500.00
        ],
        [
            'name' => 'Programming II',
            'code' => 'CSE102',
            'department_id' => 1,
            'price' => 20500.00
        ],
        [
            'name' => 'Economics I',
            'code' => 'ECO101',
            'department_id' => 2,
            'price' => 13500.00
        ],
        [
            'name' => 'Economics II',
            'code' => 'ECO102',
            'department_id' => 2,
            'price' => 15500.00
        ],
        [
            'name' => 'English I',
            'code' => 'ENG101',
            'department_id' => 3,
            'price' => 14500.00
        ],
        [
            'name' => 'English II',
            'code' => 'ENG102',
            'department_id' => 3,
            'price' => 11500.00
        ],
        [
            'name' => 'Mathematics I',
            'code' => 'MAT101',
            'department_id' => 4,
            'price' => 10500.00
        ],
        [
            'name' => 'Mathematics II',
            'code' => 'MAT102',
            'department_id' => 4,
            'price' => 13500.00
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert($this->data);
    }
}
