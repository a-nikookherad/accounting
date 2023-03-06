<?php

namespace Vision\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class VisionRouteProvider extends RouteServiceProvider
{
    public function map()
    {
        Route::group([
            "namespace" => "Vision\Http\Controllers",
            "prefix" => "api/v1",
            "middleware" => "api"
        ], function () {
            require_once __DIR__ . "/../Routes/api/v1/api.php";
        });
    }
}

