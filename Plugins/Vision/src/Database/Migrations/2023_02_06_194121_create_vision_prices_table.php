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
        Schema::create('vision_prices', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description")
                ->nullable();
            $table->smallInteger("order");
            $table->unsignedInteger("vision_id")
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
        Schema::dropIfExists('vision_prices');
    }
};
