<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->boolean('gender');
            $table->string('password', 100);
            $table->date('birthdate');
            $table->string('phone_number', 15)->nullable();
            $table->smallInteger('status');
            $table->string('desc_block', 100)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->unsignedInteger('role_id')->default('3');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
