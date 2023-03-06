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
        Schema::create('vision_attachments', function (Blueprint $table) {
            $table->id();
            $table->string("src");
            $table->string("title")
                ->nullable();
            $table->string("description")
                ->nullable();
            $table->unsignedSmallInteger("order")
                ->default(0);
            $table->boolean("is_active")
                ->default(true);
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
        Schema::dropIfExists('vision_attachments');
    }
};
