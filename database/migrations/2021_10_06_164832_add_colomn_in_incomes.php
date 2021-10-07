<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnInIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
           $table->bigInteger('level_id')->nullable()->after('status');
           $table->string('level',20)->nullable()->after('level_id');
           $table->decimal('level_percentage',20,2)->nullable()->after('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
           $table->dropColumn(['level_id','level','level_percentage']);
        });
    }
}