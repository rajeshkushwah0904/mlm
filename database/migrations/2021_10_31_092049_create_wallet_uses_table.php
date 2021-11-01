<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_uses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('distributor_id')->nullable();
            $table->decimal('wallet_amount')->nullable();
            $table->bigInteger('use_type')->nullable();
            $table->string('order_id')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->bigInteger('status')->nullable();
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
        Schema::dropIfExists('wallet_uses');
    }
}