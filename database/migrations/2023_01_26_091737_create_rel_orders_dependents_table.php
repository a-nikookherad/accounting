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
        Schema::create('rel_orders_dependents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("order_id")
                ->index("index_for_order_id_in_rel_orders_dependents");

            $table->unsignedInteger("dependent_id")
                ->index("index_for_dependent_id_in_rel_orders_dependents");

            $table->timestamps();

            $table->foreign("order_id")
                ->references("id")
                ->on("orders");

            $table->foreign("dependent_id")
                ->references("id")
                ->on("dependents");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_orders_dependents');
    }
};
