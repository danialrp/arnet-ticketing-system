<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender')->unsigned()->nullable();
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->integer('is_admin')->default(0);
            $table->integer('department')->unsigned()->nullable();
            $table->foreign('department')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('project')->unsigned()->nullable();
            $table->foreign('project')->references('id')->on('projects')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('priority')->unsigned()->nullable();
            $table->foreign('priority')->references('id')->on('priorities')->onDelete('cascade');
            $table->integer('status')->unsigned()->nullable();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
            $table->string('reference_number')->nullable();
            $table->string('note')->nullable();
            $table->boolean('deleted')->default(false);
            $table->dateTime('created_fa')->nullable();
            $table->dateTime('updated_fa')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
