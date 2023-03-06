<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
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
                "first_name" => "admin",
                "last_name" => "admin",
                "mobile" => "09111111111",
                "is_admin" => true,
                "email" => "admin@babona.ir",
                "email_verified_at" => now()->format("Y-m-d H:i:s"),
                "password" => "ipin@123",
            ]
        ];

        //get admin and everyone groups
        $groups = Group::query()
            ->where("is_admin", 1)
            ->pluck("id")
            ->toArray();

        foreach ($users as $user) {
            //create default admin user
            $userInstance = User::query()
                ->updateOrCreate(["email" => $user["email"]], $user);
            $userInstance->groups()->attach($groups);
        }
    }
}
