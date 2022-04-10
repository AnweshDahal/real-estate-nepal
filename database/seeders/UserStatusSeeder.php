<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_statuses = [
            [
                'id' => 1,
                'user_id' => 1,
                'role' => UserStatus::ROLES['admin'],
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'role' => UserStatus::ROLES['user'],
            ],
        ];

        UserStatus::insert($user_statuses);
    }
}
