<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnsInDistributors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('distributors', function (Blueprint $table) {
              $table->timestamp('dob')->nullable()->after('status');
            $table->decimal('wallet_amount',20,2)->nullable()->after('dob');
            $table->decimal('total_income',20,2)->nullable()->after('wallet_amount');
            $table->string('gender',50)->nullable()->after('total_income');
            $table->string('profile_image')->nullable()->after('gender');
            $table->bigInteger('pincode')->nullable()->after('profile_image');
            
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
            $table->dropColumn(['wallet_amount','total_income','dob','gender','profile_image','pincode']);
        });
    }
}