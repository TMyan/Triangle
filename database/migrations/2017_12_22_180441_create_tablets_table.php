<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('are_available');
            $table->string('network');
            $table->string('wifi');
            $table->string('speed');
            $table->string('dimensions');
            $table->string('weight');
            $table->string('ram');
            $table->string('hdd');
            $table->string('cart_slot');
            $table->string('bluetooth');
            $table->string('primary');
            $table->string('secondary');
            $table->string('os');
            $table->string('cpu');
            $table->string('browser');
            $table->string('gps');
            $table->string('battery');
            $table->string('status');
            $table->string('sim');
            $table->decimal('price');
            $table->string('usb');
            $table->string('like');
            $table->string('not_like');
            $table->text('options_en');
            $table->text('options_am');
            $table->text('options_ru');
            $table->string('photos', 1000);
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
        Schema::dropIfExists('tablets');
    }
}
