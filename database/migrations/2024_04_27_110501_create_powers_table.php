<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowersTable extends Migration
{
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->id();
            $table->Integer('power');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powers');
    }
};
