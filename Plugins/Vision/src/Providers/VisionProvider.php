<?php

namespace Vision\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Vision\Entities\Repositories\VisionRepository;
use Vision\Entities\Repositories\VisionRepositoryInterface;

class VisionProvider extends ServiceProvider
{
    public function register()
    {
        // Map vision's repository to interface
        $this->app->bind(VisionRepositoryInterface::class, function () {
            return App::make(VisionRepository::class);
        });
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . "/../lang", "Vision");
        $this->loadMigrationsFrom(__DIR__ . "/../Migrations");
    }
}

