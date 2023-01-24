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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("amount")
                ->default(0);
            $table->unsignedInteger("account_id");
            $table->unsignedInteger("financial_period_id");

            $table->timestamps();

            $table->foreign("financial_period_id")
                ->references("id")
                ->on("financial_periods");
            $table->foreign("account_id")
                ->references("id")
                ->on("accounts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
};