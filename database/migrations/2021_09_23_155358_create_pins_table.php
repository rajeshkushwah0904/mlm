<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('package_id')->nullable();
            $table->string('transfer_to')->nullable();
           $table->string('used_by')->nullable();
            $table->bigInteger('status')->nullable();
          $table->bigInteger('added_id')->nullable();
           $table->bigInteger('updated_id')->nullable();
             $table->string('generated_pin',20)->nullable();
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
        Schema::dropIfExists('pins');
    }
}