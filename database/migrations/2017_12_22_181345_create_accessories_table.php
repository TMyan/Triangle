<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('are_available');
            $table->decimal('price', 10, 4);
            $table->string('status');
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
        Schema::dropIfExists('accessories');
    }
}
