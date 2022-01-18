<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->id();
            $table->string('pancard_no')->nullable();
            $table->string('pancard_file')->nullable();
            $table->bigInteger('aadhaarcard_no')->nullable();
            $table->string('aadhaar_card_file')->nullable();
            $table->string('backend_aadhaar_card_file')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_document')->nullable();
            $table->bigInteger('distributor_id')->nullable();
            $table->bigInteger('distributor_user_id')->nullable();
            $table->bigInteger('added_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('nominees');
    }
}