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
            'name' => (string)file_get_contents('http://loripsum.net/api/1/short/headers'),
            'description' => (string)file_get_contents('http://loripsum.net/api/1/short'),
            'price' => (mt_rand (10*10, 1000*10) / 10),
            'imageurl' => 'http://lorempixel.com/400/200/'
        ]);
    }
}
