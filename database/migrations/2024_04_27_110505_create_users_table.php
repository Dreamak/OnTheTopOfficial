<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username', 50 )->nullable(false);
            $table->bigInteger('roles_id')->unsigned();
            $table->bigInteger('members_id')->unsigned()->nullable();
            $table->bigInteger('passwords_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('roles_id')->references('id')->on('roles');
            $table->foreign('members_id')->references('id')->on('members');
            $table->foreign('passwords_id')->references('id')->on('passwords');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
