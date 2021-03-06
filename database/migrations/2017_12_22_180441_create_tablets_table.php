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
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->decimal('price', 10, 4);
            $table->string('usb');
            $table->string('options_basic_en', 3000);
            $table->string('options_basic_am', 3000);
            $table->string('options_basic_ru', 3000);
            $table->text('options_all_en');
            $table->text('options_all_am');
            $table->text('options_all_ru');
            $table->string('photo');
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
