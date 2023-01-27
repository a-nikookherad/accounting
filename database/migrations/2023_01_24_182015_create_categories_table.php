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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title");

            $table->string("title_farsi")
                ->nullable();

            $table->unsignedInteger("parent_id")
                ->index("index_for_parent_id")
                ->nullable();

            $table->boolean("is_endpoint")
                ->nullable();

            $table->boolean("is_entrypoint")
                ->nullable();

            $table->unsignedBigInteger("user_id")
                ->index("index_for_user_id_in_categories")
                ->comment("the owner of this order");

            $table->timestamps();

            $table->foreign("parent_id")
                ->references("id")
                ->on("categories");
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
