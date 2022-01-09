<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->bigInteger('module_id')->nullable();
            $table->string('module_name', 100)->nullable();
            $table->bigInteger('p_index')->nullable();
            $table->bigInteger('p_create')->nullable();
            $table->bigInteger('p_view')->nullable();
            $table->bigInteger('p_edit')->nullable();
            $table->bigInteger('p_delete')->nullable();
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
        Schema::dropIfExists('permissions');
    }
}