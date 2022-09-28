<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    protected  $data = [
        [
            'name' => 'Admin',
            'status' => 1
        ],
        [
            'name' => 'Student',
            'status' => 1
        ],
        [
            'name' => 'Faculty',
            'status' => 0
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert($this->data);
    }
}
