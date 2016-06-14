<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderedProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderID')->unique();
            $table->string('productID');
            $table->string('nickname');
            $table->string('voorletters');
            $table->string('achternaam');
            $table->string('voornaam');
            $table->string('geslacht');
            $table->string('geboortedatum');
            $table->string('adres');
            $table->string('postcode');
            $table->string('woonplaats');
            $table->string('telMobiel');
            $table->string('telThuis');
            $table->rememberToken();
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
        Schema::drop('order_items');
    }
}
