<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $factory->define(Product::class, function (Faker $faker) {
            return [
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 1000),
                'image' => $faker->imageUrl(),
                'category' => 'GSM'
            ];
        });
        
    }
}