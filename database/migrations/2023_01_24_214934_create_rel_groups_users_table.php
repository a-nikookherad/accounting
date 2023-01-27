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
        Schema::create('rel_groups_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger("user_id")
                ->index("index_for_user_id_in_rel_groups_users");

            $table->unsignedInteger("group_id")
                ->index("index_for_group_id_in_rel_groups_users");

            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            $table->foreign("group_id")
                ->references("id")
                ->on("groups");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_groups_users');
    }
};
