<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->unsigned()->nullable();
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('ip_address')->nullable();
            $table->dateTime('login_time')->nullable();
            $table->string('note')->nullable();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_fa')->nullable();
            $table->rememberToken();
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
