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
            $table->string('company_name');
            $table->string('address')->nullable();
            $table->string('name')->nullable();
//            $table->string('phone')->nullable();
            $table->string('nip')->nullable();
//            $table->string('website')->nullable();
//            $table->text('description')->nullable();
            $table->integer('role');
            $table->string('email')->unique();
//            $table->string('tr_last')->nullable();
            $table->integer('package')->nullable();
            $table->boolean('period_email')->default(1);
//            $table->date('status_close')->nullable();
            $table->string('password');
            $table->string('conf_hash');
            $table->string('mail_conf')->default(0);
            $table->integer('rule')->default(0);
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
