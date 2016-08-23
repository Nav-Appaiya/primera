<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 05-06-16
 * Time: 08:53
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description');
            $table->string('status');
//            $table->enum('choices', ['foo', 'bar']);
            $table->decimal('discount', 5, 2);
            $table->decimal('price', 5, 2);
//            $table->string('imageurl');
//            $table->string('category_id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('products');
    }
}
