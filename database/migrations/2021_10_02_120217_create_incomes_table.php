<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->nullable();
            $table->decimal('amount',20,2)->nullable();
            $table->string('distributor_id')->nullable();
           $table->string('income_type',20)->nullable();
            $table->bigInteger('status')->nullable();
             $table->string('sponsor_id',20)->nullable();
             $table->decimal('sponsor_amount',20,2)->nullable();
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
        Schema::dropIfExists('incomes');
    }
}