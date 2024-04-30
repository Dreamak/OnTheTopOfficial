<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gdc_placements', function (Blueprint $table) {
            $table->id();
            $table->Integer('power');
            $table->bigInteger('guild_wars_id')->unsigned()->nullable();
            $table->bigInteger('members_id')->unsigned();
            $table->timestamps();

            $table->foreign('guild_wars_id')->references('id')->on('guild_wars');
            $table->foreign('members_id')->references('id')->on('members');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('gdc_placements');
    }
};
