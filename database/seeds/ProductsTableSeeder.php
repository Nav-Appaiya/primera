<?php

use Illuminate\Database\Seeder;

/**
 * Class ProductsTableSeeder
 */
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ProductsTableSeeder September 2016
        // Updated: Nav Appaiya op 15-09-2016 15:18

        $productId = mt_rand(0, 1000);
        $categoryId = mt_rand(0, 1000);
        
        DB::table('categories')->insert([
            'id' => $categoryId,
            'category_id' => $categoryId,
            'title' => 'Smokestik',
            'image' => 'default.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'id' => $productId,
            'name' => 'Menthol 12mg (Medium)',
            'description' => 'Menthol 12mg (Medium) De e-liquids van SmokeStik zijn 100% made in Holland! SmokeStik ' .
                'introduceert een premium e-liquid die volledig is samengesteld uit Nederlandse ingrediënten en ' .
                'volledig wordt geproduceerd in een Nederland.',
            'status' => 1,
            'discount' => '1,00',
            'price' => '5,95',
            'category_id' => $categoryId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
