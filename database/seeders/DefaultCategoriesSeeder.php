<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //default categories for accounting
        $data = [
            [
                "title" => "incomes",
                "title_farsi" => "درآمد ها",
                "parent_id" => null,
                "is_endpoint" => false,
                "is_entrypoint" => true,
            ],
            [
                "title" => "funds",
                "title_farsi" => "سرمایه",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => true,
            ],
            [
                "title" => "costs",
                "title_farsi" => "هزینه ها",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => false,
            ],
            [
                "title" => "creditor",
                "title_farsi" => "بستانکار",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => false,
            ],
            [
                "title" => "debtor",
                "title_farsi" => "بدهکار",
                "parent_id" => null,
                "is_endpoint" => false,
                "is_entrypoint" => true,
            ],
            [
                "title" => "cash",
                "title_farsi" => "صندوق ها",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => true,
            ],
            [
                "title" => "assets",
                "title_farsi" => "دارایی ها",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => true,
            ],
            [
                "title" => "debts",
                "title_farsi" => "بدهی ها",
                "parent_id" => null,
                "is_endpoint" => true,
                "is_entrypoint" => false,
            ],
        ];

        foreach ($data as $datum) {
            Category::query()
                ->updateOrCreate(["title" => $datum["title"]], $datum);
        }
    }
}
