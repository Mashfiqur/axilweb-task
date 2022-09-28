<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    protected $data = [
        [
            'user_id' => 1,
            'role_id' => 1
        ],
        [
            'user_id' => 2,
            'role_id' => 2
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::insert($this->data);
    }
}
