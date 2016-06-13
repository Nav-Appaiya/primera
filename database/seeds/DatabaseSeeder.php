<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productImage = 'http://www.esigaretervaring.nl/wp-content/uploads/2014/04/Elektrische-sigaret-voorbeeld-300x225.jpg';
        $createdAt = new DateTime();
        $updatedAt = new DateTime();
        DB::table('users')->insert([
            'nickname' => 'admin',
            'email' => 'navarajh'.mt_rand(0,200).'@gmail.com',
            'password' => bcrypt('admin'),
            'voorletters' => 'N.',
            'achternaam' => 'Appaiya',
            'geslacht' => 'man',
            'geboortedatum' => '24-01-1992',
            'voornaam' => 'Nav',
            'adres' => 'Rijnvoorde 42',
            'postcode' => '3085TJ',
            'woonplaats' => 'Rotterdam',
            'telMobiel' => '0645705721',
            'telThuis' => '0645705721',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        DB::table('orders')->insert([
            'user_id' => mt_rand(0,1200),
            'shipping_address' => 'rijnvoorde 42, 3085TJ Rotterdam',
            'billing_address' => 'rijnvoorde 42, 3085TJ Rotterdam',
            'amount' => '18,95',
            'status' => 'paid',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        DB::table('products')->insert([
            'name' => 'product ' . mt_rand(0, 200),
            'description' => 'Beschrijving bij product',
            'price' => '19,95',
            'imageurl' => $productImage,
            'category_id' => '1',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        DB::table('categories')->insert([
            'categoryID'=>'1',
            'title'=>'Category' . mt_rand(0,15),
            'image'=>'http://www.esigaretervaring.nl/wp-content/uploads/2014/04/Elektrische-sigaret-voorbeeld-300x225.jpg',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);
    }
}
