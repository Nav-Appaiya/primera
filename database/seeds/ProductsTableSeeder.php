<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => (string)file_get_contents('http://loripsum.net/api/1/short/headers'),
            'name' => (string)file_get_contents('http://loripsum.net/api/1/short'),
            'description' => (mt_rand (10*10, 1000*10) / 10),
            'price' => 'http://lorempixel.com/400/200/',
            'imageurl' => 'http://lorempixel.com/400/200/'
        ]);
    }
}
