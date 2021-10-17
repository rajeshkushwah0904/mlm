<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('distributor_id')->nullable();
            $table->string('distributor_name')->nullable();
            $table->string('email')->nullable();
             $table->string('mobile')->nullable();
             
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->decimal('total_taxable_amount',20,2)->nullable();
            $table->decimal('total_gst_amount',20,2)->nullable();
            $table->decimal('delivery_amount',20,2)->nullable();
            $table->decimal('total_discount',20,2)->nullable();
            $table->decimal('total_amount',20,2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}