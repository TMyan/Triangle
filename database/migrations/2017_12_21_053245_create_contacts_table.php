<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en');
            $table->string('title_am');
            $table->string('title_ru');
            $table->string('address_en');
            $table->string('address_am');
            $table->string('address_ru');
            $table->text('text_en');
            $table->text('text_am');
            $table->text('text_ru');
            $table->string('phone');
            $table->string('email');
            $table->string('image', 1000);
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
        Schema::dropIfExists('contacts');
    }
}
