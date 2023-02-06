<?php

namespace Vision\Providers;

use Illuminate\Support\ServiceProvider;

class VisionProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/v1/api.php");
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Migrations");
    }
}

