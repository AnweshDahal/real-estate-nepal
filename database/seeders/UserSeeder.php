<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'phone_number' => '9876543210',
            ], [
                'id' => 2,
                'first_name' => 'Sum',
                'last_name' => 'juan',
                'email' => 'sum1@gmail.com',
                'password' => bcrypt('password'),
                'phone_number' => '9876543210',
            ]
        ];

        User::insert($users);

    }
}
