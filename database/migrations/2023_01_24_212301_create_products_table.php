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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string("name");

            $table->string("name_farsi");

            $table->boolean("is_endpoint")
                ->nullable();

            $table->boolean("is_entrypoint")
                ->nullable();

            $table->unsignedBigInteger("user_id")
                ->index("index_for_user_id_in_products")
                ->comment("the owner of this order");
            $table->foreign("user_id")
                ->references("id")
                ->on("users");

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
        Schema::dropIfExists('products');
    }
};
