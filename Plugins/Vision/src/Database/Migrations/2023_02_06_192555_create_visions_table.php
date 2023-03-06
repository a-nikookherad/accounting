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
        Schema::create('visions', function (Blueprint $table) {
            $table->id();
            $table->string("title")
                ->comment("vision title");
            $table->string("wish_title")
                ->comment("What does she or he want?");
            $table->string("wish_amount")
                ->comment("How much she or he wants");
            $table->enum("status", ["wishlist", "in_progress", "done", "cancel"])
                ->default("wishlist");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visions');
    }
};
