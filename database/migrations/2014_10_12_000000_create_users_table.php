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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('adresse');
            $table->string('pays');
            $table->string('region');
            $table->string('role')->default('labo');
            $table->string('telephone')->unique();
            $table->string('zip');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_user')->nullable();
            $table->string('mail_user')->nullable();
            $table->string('agree');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
