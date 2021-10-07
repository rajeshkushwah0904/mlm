<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributor_levels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('L0')->nullable();
            $table->bigInteger('L1')->nullable();
            $table->bigInteger('L2')->nullable();
            $table->bigInteger('L3')->nullable();
            $table->bigInteger('L4')->nullable();
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
        Schema::dropIfExists('distributor_levels');
    }
}