<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaulWalletSeeder extends Seeder
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
                "title" => "toman",
                "title_farsi" => "تومان",
                "is_default" => true,
            ],
            /*[
                "title" => "dollar",
                "is_default" => false,
            ]*/
        ];

        foreach ($data as $datum) {
            Wallet::query()
                ->updateOrCreate(["title" => $datum["title"]], $datum);
        }
    }
}
