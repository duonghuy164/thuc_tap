<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimekeepingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timekeeping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->timestamp('check_in')->nullable();
            $table->timestamp('check_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timekeeping');
    }
}
