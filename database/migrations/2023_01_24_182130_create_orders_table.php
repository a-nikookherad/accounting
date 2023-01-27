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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("amount");

            $table->string("description")
                ->nullable();

            $table->enum("status", [
                "paid"
            ]);

            $table->morphs("orderable");

            $table->unsignedBigInteger("user_id")
                ->index("index_for_user_id_in_orders")
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
        Schema::dropIfExists('orders');
    }
};
