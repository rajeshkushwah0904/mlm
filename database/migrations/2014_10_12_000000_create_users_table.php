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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address',500);
            $table->bigInteger('mobile');
            $table->string('otp')->nullable();
            $table->string('distributor_tracking_id')->nullable();
            $table->string('distributor_id')->nullable();
            $table->string('nominee')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('dob')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->bigInteger('status')->nullable();
            $table->bigInteger('role')->nullable();
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