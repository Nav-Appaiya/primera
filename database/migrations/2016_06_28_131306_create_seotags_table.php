<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeotagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seotags', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('product_id')
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');;
            $table->string('seotag');
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
        Schema::drop('seotags');
    }
}
