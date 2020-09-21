<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->integer('user_id');
            $table->integer('group_cv_id');
            $table->text('content')->nullable();
            $table->text('note')->nullable();
            $table->integer('rating')->nullable();
            $table->boolean('important')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('file')->nullable();
            $table->string('active');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
}
