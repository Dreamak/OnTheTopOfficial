<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuildWarsTable extends Migration
{
    public function up()
    {
        Schema::create('guild_wars', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('result')->unsigned();
            $table->string('image')->nullable();
            $table->bigInteger('enemy_id_1')->unsigned()->nullable();
            $table->bigInteger('enemy_id_2')->unsigned()->nullable();
            $table->bigInteger('enemy_id_3')->unsigned()->nullable();
            $table->timestamps();

            // Assuming enemy_id columns refer to guilds table.
            $table->foreign('enemy_id_1')->references('id')->on('guilds');
            $table->foreign('enemy_id_2')->references('id')->on('guilds');
            $table->foreign('enemy_id_3')->references('id')->on('guilds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guild_wars');
    }
};
