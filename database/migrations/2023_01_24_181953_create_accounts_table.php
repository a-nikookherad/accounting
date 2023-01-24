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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->morphs("accountable");
            $table->unsignedInteger("wallet_id");
            $table->boolean("is_treasury")
                ->default(false);
            $table->timestamps();

            $table->foreign("wallet_id")
                ->references("id")
                ->on("wallet");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
