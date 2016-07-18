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
        $this->call('ProductsTableSeeder');
        $this->call('UsersTableSeeder');

        $productImage = 'http://www.esigaretervaring.nl/wp-content/uploads/2014/04/Elektrische-sigaret-voorbeeld-300x225.jpg';
        $createdAt = new DateTime();
        $updatedAt = new DateTime();

        // Users seeder
        DB::table('users')->delete();
        
        $userId = 1;
        DB::table('users')->insert([
            'id' => $userId,
            'email' => 'navarajh@gmail.com',
            'password' => bcrypt('admin'),
            'voorletters' => 'N.',
            'achternaam' => 'Appaiya',
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

        // Orders seeder
        DB::table('orders')->insert([
            'user_id' => $userId,
            'shipping_address' => 'rijnvoorde 42, 3085TJ Rotterdam',
            'billing_address' => 'rijnvoorde 42, 3085TJ Rotterdam',
            'amount' => '18,95',
            'status' => 'paid',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        // Product seeder
        $productId = mt_rand(0,2000);
        $productBeschrijving = 'Beschrijving bij product ' . $productId;

        DB::table('seotags')->insert([
            'id' => mt_rand(0,200),
            'product_id' => $productId,
            'seotag' => $productBeschrijving,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        // Category seeder
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'categoryID'=>'1',
            'title'=>'Category' . mt_rand(0,15),
            'image'=>'http://www.esigaretervaring.nl/wp-content/uploads/2014/04/Elektrische-sigaret-voorbeeld-300x225.jpg',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        // Pages seeder
        DB::table('pages')->delete();
        DB::table('pages')->insert([
            'name' => 'Over',
            'content' => 'Wij vinden het altijd leuk om reacties te krijgen. Onze voorkeur is per 
        bezoek of e-mail, maar ook telefonisch, per fax of per post staan we je graag te 
        woord. Gebruik hiervoor onderstaande contactinformatie: <br /> <br /> eSigarett.nl <br />',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        DB::table('pages')->insert([
            'name' => 'Producten',
            'content' => 'Productenlijst',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact',
            'content' => 'Contact met ons',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        ]);
    }
}
