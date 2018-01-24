<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('type');
            $table->string('are_available');
            $table->string('lan');
            $table->string('weight');
            $table->string('ram');
            $table->string('hdd');
            $table->string('os');
            $table->string('cpu');
            $table->string('graphic card');
            $table->string('odd');
            $table->string('status');
            $table->decimal('price', 10, 4);
            $table->string('cache');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
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
        Schema::dropIfExists('computers');
    }
}
