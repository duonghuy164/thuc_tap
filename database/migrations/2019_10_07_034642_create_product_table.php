<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('price_id');
            $table->string('color_id');
            $table->integer('ram_id')->nullable();
            $table->integer('hard_drive_id')->nullable();
            $table->integer('screen_id')->nullable();
            $table->integer('cpu_id')->nullable();
            $table->string('images');
            $table->text('promotion');
            $table->integer('view');
            $table->float('rate');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('sale');
            $table->text('description');
            $table->integer('status');
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
        Schema::dropIfExists('product');
    }
}
