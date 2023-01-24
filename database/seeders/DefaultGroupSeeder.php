<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "title" => "anyone",
            "title_farsi" => "هر کسی",
            "is_default" => true,
        ];

        foreach ($data as $datum) {
            Group::query()
                ->updateOrCreate(["title" => $datum["title"]], $datum);
        }
    }
}
