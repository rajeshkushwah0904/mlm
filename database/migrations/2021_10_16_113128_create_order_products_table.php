<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('order_id')->nullable();
            $table->string('product_name')->nullable();
            $table->decimal('product_taxable_amount',20,2)->nullable();
            $table->decimal('product_gst_amount',20,2)->nullable();
            $table->decimal('product_amount',20,2)->nullable();
            $table->decimal('qty')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}