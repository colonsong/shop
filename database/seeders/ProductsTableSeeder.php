<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::create([
        //     'name' => Str::random(20),
        //     'pic' => '1.jpg',
        //     'content' => Str::random(100),
        //     'price' => '100',
        //     'sell_at' => null,
        //     'enabled' => true,
        // ]);

        Product::factory()->count(10)->create(); 
    }
}
