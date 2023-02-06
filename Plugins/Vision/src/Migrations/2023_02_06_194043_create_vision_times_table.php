<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_times', function (Blueprint $table) {
            $table->id();
            $table->enum("type",["on_time","extra_time"]);
            $table->date("will_achieve_at");
            $table->unsignedInteger("vision_id")
                ->index();
            $table->timestamps();
            $table->foreign("vision_id")
                ->references("id")
                ->on("visions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vision_times');
    }
};
