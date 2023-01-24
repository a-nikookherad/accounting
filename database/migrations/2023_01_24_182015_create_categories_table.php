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
            $table->unsignedInteger("parent_id")
                ->nullable();
            $table->unsignedInteger("budget_id")
                ->nullable();
            $table->timestamps();

            $table->foreign("parent_id")
                ->references("id")
                ->on("categories");
            $table->foreign("budget_id")
                ->references("id")
                ->on("budgets");
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
