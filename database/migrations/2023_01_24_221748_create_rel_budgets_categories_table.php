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
        Schema::create('rel_budgets_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("budget_id");
            $table->unsignedInteger("category_id");
            $table->timestamps();

            $table->foreign("budget_id")
                ->references("id")
                ->on("budgets");

            $table->foreign("category_id")
                ->references("id")
                ->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_budgets_categories');
    }
};
