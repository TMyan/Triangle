<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmartWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_watches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('are_available');
            $table->string('size');
            $table->string('bluetooth');
            $table->string('accelerometer');
            $table->string('rom');
            $table->string('like');
            $table->string('not_like');
            $table->string('battery');
            $table->decimal('price', 10, 4);
            $table->string('status');
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
        Schema::dropIfExists('smart_watches');
    }
}
