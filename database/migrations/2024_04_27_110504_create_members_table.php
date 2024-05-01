<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('ingame_name');
            $table->bigInteger('guilds_id')->unsigned()->nullable();
            $table->bigInteger('powers_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('guilds_id')->references('id')->on('guilds')->onDelete('cascade');
            $table->foreign('powers_id')->references('id')->on('powers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
