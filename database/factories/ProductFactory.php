<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->word(),
            'pic' => '1.jpg',
            'content' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(1, 999),
            'sell_at' => null,
            'enabled' => true,
        ];
    }
}
