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
        Schema::create('rel_budgets_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger("budget_id")
                ->index("index_for_budget_id_in_rel_budgets_products");

            $table->unsignedInteger("product_id")
                ->index("index_for_product_id_in_rel_budgets_products");

            $table->timestamps();

            $table->foreign("budget_id")
                ->references("id")
                ->on("budgets");

            $table->foreign("product_id")
                ->references("id")
                ->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_budgets_products');
    }
};
