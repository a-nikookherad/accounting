<?php

namespace Vision\Entities\Observers;

use Vision\Models\Vision;
use Vision\Models\VisionDate;
use Vision\Models\VisionPlan;
use Vision\Models\VisionPrice;

class VisionObserver
{
    public function created(Vision $vision)
    {
        if (!request()->exists("will_achieve_at")) {
            return null;
        }

        // Create vision date
        $visionDateInstance = new VisionDate();
        $visionDateInstance->will_achieve_at = request("will_achieve_at");
        $visionDateInstance->type = request("date_type", "on_time");
        $vision->dates()->save($visionDateInstance);

        //Create vision plan
        foreach (request("plans") as $plan) {
            $visionPlanInstance = new VisionPlan();
            $visionPlanInstance->title = $plan["title"];
            $visionPlanInstance->description = $plan["description"];
            $visionPlanInstance->order = $plan["order"];
            $vision->plans()->save($visionPlanInstance);
        }

        //Create vision price
        foreach (request("prices") as $price) {
            $visionPriceInstance = new VisionPrice();
            $visionPriceInstance->title = $price["title"];
            $visionPriceInstance->description = $price["description"];
            $visionPriceInstance->order = $price["order"];
            $vision->plans()->save($visionPriceInstance);
        }
    }

    public function updated(Vision $vision)
    {
        if (!request()->exists("will_achieve_at")) {
            return null;
        }
        // Create vision date
        $visionDateInstance = new VisionDate();
        $visionDateInstance->will_achieve_at = request("will_achieve_at");
        $visionDateInstance->type = request("date_type", "on_time");
        $vision->dates()->save($visionDateInstance);

        //Create vision plan
        foreach (request("plans") as $plan) {
            $visionPlanInstance = new VisionPlan();
            $visionPlanInstance->title = $plan["title"];
            $visionPlanInstance->description = $plan["description"];
            $visionPlanInstance->order = $plan["order"];
            $vision->plans()->save($visionPlanInstance);
        }

        //Create vision price
        foreach (request("prices") as $price) {
            $visionPriceInstance = new VisionPrice();
            $visionPriceInstance->title = $price["title"];
            $visionPriceInstance->description = $price["description"];
            $visionPriceInstance->order = $price["order"];
            $vision->plans()->save($visionPriceInstance);
        }
    }

    public function deleted(Vision $vision)
    {
        // Delete all dependencies
        $vision->plans()->delete();
        $vision->prices()->delete();
        $vision->dates()->delete();
    }

    public function restored(Vision $vision)
    {
        //
    }

    public function forceDeleted(Vision $vision)
    {
        //
    }
}
