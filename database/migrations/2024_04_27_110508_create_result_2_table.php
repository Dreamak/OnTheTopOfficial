<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResult2Table extends Migration
{
    public function up()
    {
        Schema::create('result_2', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('result_image')->unsigned();
            $table->bigInteger('guild_wars_id')->unsigned();
            $table->bigInteger('enemy_2_id')->unsigned();
            $table->timestamps();

            $table->foreign('guild_wars_id')->references('id')->on('guild_wars');
            // Assuming enemy_2_id refers to a member or guild, you should adjust this accordingly.
            $table->foreign('enemy_2_id')->references('id')->on('guilds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_2s');
    }
};
