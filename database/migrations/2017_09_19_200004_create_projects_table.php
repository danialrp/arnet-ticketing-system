<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('owner')->unsigned()->nullable();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->unsigned()->nullable();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
            $table->string('note')->nullable();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_fa')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
