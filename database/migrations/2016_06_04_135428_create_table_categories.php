<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title', 50);
            $table->string('image', 20);
            $table->timestamps();
//            $table->increments('id')->unsigned();
//            $table->integer('cate_id')->unsigned();
//            $table->foreign('cate_id')->references('id')->on('categories');
//            $table->string('name');
//            $table->string('image');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
