<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_dates', function (Blueprint $table) {
            $table->id();
            $table->enum("type", ["on_time", "extra_time"]);
            $table->date("will_achieve_at");
            $table->boolean("is_active")
                ->default(true);
            $table->unsignedBigInteger("vision_id")
                ->index();
            $table->softDeletes();
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
        Schema::dropIfExists('vision_dates');
    }
};
