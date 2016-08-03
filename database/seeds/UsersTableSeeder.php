<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => uniqid('navarajh').'@gmail.com',
            'password' => bcrypt('admin'),
            'voorletters' => str_random(10),
            'achternaam' => str_random(10),
            'voornaam' => str_random(10),
            'geboortedatum' => str_random(10),
            'adres' => str_random(10),
            'postcode' => str_random(10),
            'woonplaats' => str_random(10),
            'is_admin' => '1',
            'telMobiel' => str_random(10).'@gmail.com',
            'telThuis' => bcrypt('secret'),
        ]);
    }
}
