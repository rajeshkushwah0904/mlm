<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_banners', function (Blueprint $table) {
         $table->id();
$table->string('popup_name')->nullable();
$table->string('image')->nullable();
$table->bigInteger('status')->nullable();
$table->bigInteger('added_by')->nullable();
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
        Schema::dropIfExists('popup_banners');
    }
}
