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
        Schema::create('rel_categories_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger("category_id")
                ->index("index_for_category_id_in_rel_categories_products");

            $table->unsignedInteger("product_id")
                ->index("index_for_product_id_in_rel_categories_products");

            $table->timestamps();

            $table->foreign("category_id")
                ->references("id")
                ->on("categories");
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
        Schema::dropIfExists('rel_categories_products');
    }
};
