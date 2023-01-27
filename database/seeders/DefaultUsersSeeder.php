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
        $data = [
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

        foreach ($data as $datum) {
            //create default admin user
            $userInstance = User::query()
                ->updateOrCreate(["email" => $datum["email"]], $datum);
            $userInstance->groups()->attach($groups);
        }
    }
}
