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
        Schema::dropIfExists('accessories');
    }
}
