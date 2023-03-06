<?php

namespace Vision\Database\Seeders;

use Illuminate\Database\Seeder;
use Vision\Entities\Models\Vision;
use Vision\Entities\Models\VisionDate;
use Vision\Entities\Models\VisionPlan;
use Vision\Entities\Models\VisionPrice;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visions = $this->getData();
        foreach ($visions as $vision) {
            $vision = collect($vision);
            $visionInstance = Vision::query()
                ->updateOrCreate(["title" => $vision["title"]], $vision->only([
                    "title",
                    "wish_title",
                    "wish_amount",
                    "status",
                ])->toArray());
            foreach ($vision->only("dates")->get("dates") as $date) {
                $dateInstance = new VisionDate();
                $dateInstance->type = $date["type"];
                $dateInstance->will_achieve_at = $date["will_achieve_at"];
                $dateInstance->is_active = $date["is_active"];
                $dateInstance->vision_id = $visionInstance->id;
                $visionInstance->dates()->save($dateInstance);
            }
            foreach ($vision->only("plans")->get("plans") as $plan) {
                $planInstance = new VisionPlan();
                $planInstance->title = $plan["title"];
                $planInstance->description = $plan["description"];
                $planInstance->order = $plan["order"];
                $planInstance->is_done = $plan["is_done"];
                $planInstance->vision_id = $visionInstance->id;
                $visionInstance->plans()->save($planInstance);
            }
            foreach ($vision->only("prices")->get("prices") as $price) {
                $priceInstance = new VisionPrice();
                $priceInstance->title = $price["title"];
                $priceInstance->description = $price["description"];
                $priceInstance->order = $price["order"];
                $priceInstance->vision_id = $visionInstance->id;
                $visionInstance->prices()->save($priceInstance);
            }
        }
    }

    private function getData()
    {
        return [
            [
                "title" => "سرمایه گذاری",
                "wish_title" => "استراتژی معاملاتی",
                "wish_amount" => "استراتژی ۶۰ درصد",
                "status" => Vision::WISHLIST,
                "dates" => [
                    [
                        "type" => "on_time",
                        "will_achieve_at" => "2023-02-24",
                        "is_active" => true,
                    ]
                ],
                "prices" => [
                    [
                        "title" => "زمان",
                        "description" => "هر چی زمان خودم هست رو میذارم",
                        "order" => 1,
                    ],
                    [
                        "title" => "تمرکز",
                        "description" => "تمرکز و انرژیم رو میذارم",
                        "order" => 2,
                    ]
                ],
                "plans" => [
                    [
                        "title" => "آموزش",
                        "description" => "دیدن آموزش تحلیل تکنیکال",
                        "order" => 1,
                        "is_done" => false,
                    ],
                    [
                        "title" => "تست استراتژی",
                        "description" => "جستجو برای مقوله ی بک تست و فوروارد تست برای استراتژی",
                        "order" => 2,
                        "is_done" => false,
                    ]
                ],
            ],
        ];
    }
}
