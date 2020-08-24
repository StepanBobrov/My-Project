<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Товар');
            $table->string('category');
            $table->text('about');
            $table->double('price')->nullable();
            $table->integer('number');
            $table->integer('discount')->nullable();
            $table->text('file')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('votes')->nullable();
            $table->timestampsTz();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuffs');
    }
}
