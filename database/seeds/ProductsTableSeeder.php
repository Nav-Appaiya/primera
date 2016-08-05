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
        $prop1Id = mt_rand(0,10000);
        $prop2Id = mt_rand(0,10000);
        $prop3Id = mt_rand(0,10000);
        $prop4Id = mt_rand(0,10000);
        $prodPropId = mt_rand(0,1000);
        $stocklevel = mt_rand(0,999);
// Category seeder
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'id'=>'1',
            'title'=>'e-Leaf',
            'categoryID' => 0,
            'image'=>'/uploads/img/eleaf_logo.png',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('products')->insert([
            'id' => $productId,
            'name' => 'ELEAF INANO KIT BLACK',
            'description' => 'De eLeaf iNano is een buitengewoon compacte all-in-one eLeaf starterset. De ingebouwde batterij heeft een capaciteit van 650 mAh en ook de iNano clearomizer bevindt zich, door middel van een magnetisch koppelsysteem, binnenin de body. Hierdoor is de iNano gemakkelijk mee te dragen. De clearomizer heeft een tankinhoud van 0,8 ml en een coil met een weerstand van 1.2 Ohm. De coil is niet verwisselbaar dus wanneer deze versleten is, kan deze vervangen worden door een nieuwe iNano clearomizer.',
            'price' => '19,95',
            'category_id' => 0,
            'imageurl' => '/assets/img/eleaf.jpg',
            'stock' => $stocklevel,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('property')->insert([
            'id' => 999,
            'name' => 'voorraad'
        ]);
        DB::table('property')->insert([
            'id' => $prop1Id,
            'name' => 'kleur'
        ]);
        DB::table('property')->insert([
            'id' => $prop2Id,
            'name' => 'Afmetingen'
        ]);
        DB::table('property')->insert([
            'id' => $prop3Id,
            'name' => 'Capaciteit'
        ]);
        DB::table('property')->insert([
            'id' => $prop4Id,
            'name' => 'Aansluiting'
        ]);

        DB::table('product_property')->insert([
            'productID'=>$productId,
            'propertyID'=>999,
            'value'=> 150
        ]);

        DB::table('product_property')->insert([
            'id' => mt_rand(0,1000),
            'productID' => $productId,
            'propertyID' => $prop1Id,
            'value' => 'zwart',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('product_property')->insert([
            'id' => mt_rand(0,1000),
            'productID' => $productId,
            'propertyID' => $prop2Id,
            'value' => '64,5 x 29 x 19,5 mm',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('product_property')->insert([
            'id' => mt_rand(0,1000),
            'productID' => $productId,
            'propertyID' => $prop3Id,
            'value' => '650 mAh',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('product_property')->insert([
            'id' => mt_rand(0,1000),
            'productID' => $productId,
            'propertyID' => $prop4Id,
            'value' => '510',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

    }
}
