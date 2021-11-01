<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnInDistributorsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->decimal('total_wallet_amount', 20, 2)->nullable()->after('activate_date');
            $table->decimal('used_wallet_amount', 20, 2)->nullable()->after('total_wallet_amount');
            $table->decimal('remaining_wallet_amount', 20, 2)->nullable()->after('used_wallet_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->dropColumn(['total_wallet_amount', 'used_wallet_amount', 'remaining_wallet_amount']);

        });
    }
}