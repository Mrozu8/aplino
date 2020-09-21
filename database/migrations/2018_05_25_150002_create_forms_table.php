<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('profession');
            $table->text('description')->nullable();
            $table->string('company');
            $table->string('voi');
            $table->string('city');
            $table->string('street')->nullable();
            $table->boolean('edit')->default(1);
            $table->text('title');
            $table->string('name')->boolean()->nullable();
            $table->string('surname')->boolean()->nullable();
            $table->string('birthday')->boolean()->nullable();
            $table->string('email')->boolean()->nullable();
            $table->string('phone')->boolean()->nullable();
            $table->string('file')->boolean()->nullable();
            $table->string('active')->boolean()->nullable();
            $table->date('active_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
