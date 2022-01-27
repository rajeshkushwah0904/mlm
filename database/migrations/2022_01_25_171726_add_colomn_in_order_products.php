<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnInOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->bigInteger('product_id')->nullable()->after('id');
            $table->decimal('mrp', 20, 2)->nullable()->after('product_id');
            $table->decimal('distributor_price', 20, 2)->nullable()->after('mrp');
            $table->decimal('business_volume', 20, 2)->nullable()->after('distributor_price');
            $table->decimal('cgst_rate', 20, 2)->nullable()->after('business_volume');
            $table->decimal('cgst_amount', 20, 2)->nullable()->after('cgst_rate');

            $table->decimal('sgst_rate', 20, 2)->nullable()->after('cgst_amount');
            $table->decimal('sgst_amount', 20, 2)->nullable()->after('cgst_rate');

            $table->decimal('igst_rate', 20, 2)->nullable()->after('sgst_amount');
            $table->decimal('igst_amount', 20, 2)->nullable()->after('sgst_rate');

            $table->decimal('tax_amount', 20, 2)->nullable()->after('igst_amount');
            $table->decimal('total_amount', 20, 2)->nullable()->after('tax_amount');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropColumn(['product_id', 'mrp', 'distributor_price', 'business_volume', 'cgst', 'sgst', 'igst', 'tax_amount', 'total_amount']);
        });

    }
}