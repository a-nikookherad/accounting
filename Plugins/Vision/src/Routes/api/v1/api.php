<?php

use Illuminate\Support\Facades\Route;

Route::get("visions", "VisionController@index");
Route::post("visions", "VisionController@store");
Route::put("visions/{vision}", "VisionController@update");
Route::patch("visions/{vision}", "VisionController@planStatusToggle");
Route::delete("visions/{vision}", "VisionController@destroy");
