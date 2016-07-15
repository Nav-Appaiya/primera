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
        $productId = mt_rand(0,1000);
        $propId = mt_rand(0,10000);
        $prodPropId = mt_rand(0,1000);

        DB::table('products')->insert([
            'id' => $productId,
            'name' => (string)file_get_contents('http://loripsum.net/api/1/short'),
            'description' => (mt_rand (10*10, 1000*10) / 10),
            'price' => 'http://lorempixel.com/400/200/',
            'imageurl' => 'https://www.esigaret.nl/media/catalog/product/cache/9/image/308x308/0dc2d03fe217f8c83829496872af24a0/k/a/kangertech-e-smart-alle-kleuren.jpg'
        ]);

        DB::table('property')->insert([
            'id' => $propId,
            'name' => 'kleur'
        ]);

        $kleuren = ['rood',
            'geel',
            'blauw',
            'bruin',
            'paars'
        ];

        DB::table('product_property')->insert([
            'id' => mt_rand(0,1000),
            'productID' => $productId,
            'propertyID' => $propId,
            'value' => $kleuren[mt_rand(0,4)],
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}
