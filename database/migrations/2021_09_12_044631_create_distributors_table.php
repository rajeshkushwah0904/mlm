<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('distributor_tracking_id')->nullable()->unique();
            $table->string('address',500);
            $table->bigInteger('mobile');
            $table->bigInteger('status');
            $table->bigInteger('distributor_is_paid');
            $table->string('sponsor_id')->nullable();
            $table->string('nominee')->nullable();
            $table->timestamp('joining_date')->nullable();
            $table->timestamp('activate_date')->nullable();
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
        Schema::dropIfExists('distributors');
    }
}