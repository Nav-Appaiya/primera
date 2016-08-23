<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->nullable();
            $table->string('name');
            $table->string('password');
            $table->string('voorletters');
            $table->string('achternaam');
            $table->string('voornaam');
            $table->string('geslacht');
            $table->string('geboortedatum');
            $table->string('adres');
            $table->string('huisnummer');
            $table->string('postcode');
            $table->string('woonplaats');
            $table->string('telMobiel');
            $table->string('telThuis');
            $table->boolean('is_admin');
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
        Schema::drop('users');
    }
}
