<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->costs();
    }

    private function debts()
    {
        $debts = [
            [
                [
                    "name" => "food",
                    "name_farsi" => "اغذیه",
                ],
            ],
        ];

        foreach ($debts as $debt) {

        }
    }

    private function costs(): void
    {
        $costs = [
            [
                "name" => "food",
                "name_farsi" => "اغذیه",
            ],
            [
                "name" => "housing",
                "name_farsi" => "مسکن",
            ],
            [
                "name" => "clothes_and_apparel",
                "name_farsi" => "البسه و پوشاک",
            ],
            [
                "name" => "car",
                "name_farsi" => "خودرو",
            ],
            [
                "name" => "traveling",
                "name_farsi" => "ایاب و ذهاب و مسافرت",
            ],
            [
                "name" => "education",
                "name_farsi" => "آموزش و تحصیلات",
            ],
            [
                "name" => "entertainment",
                "name_farsi" => "فرهنگی و سرگرمی",
            ],
            [
                "name" => "present",
                "name_farsi" => "هدایا",
            ],
            [
                "name" => "health_care",
                "name_farsi" => "بهداشتی درمانی",
            ],
            [
                "name" => "official",
                "name_farsi" => "هزینه های اداری",
            ],
            [
                "name" => "religion",
                "name_farsi" => "دیون",
            ],
            [
                "name" => "investment",
                "name_farsi" => "سرمایه گذاری",
            ],
            [
                "name" => "the_gym",
                "name_farsi" => "باشگاه",
            ]
        ];

        foreach ($costs as $cost) {
            Product::query()
                ->updateOrCreate(["name" => $cost["name"]], $cost);
        }
    }
}
