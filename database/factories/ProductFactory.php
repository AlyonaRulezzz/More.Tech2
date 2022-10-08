<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * @var \Illuminate\Database\Eloquent\Factory $factory
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
        'name' => $this->faker->name(),
        'content' => $this->faker->realText(rand(400, 500)),
        'price' => rand(1000, 2000),
        ];
    }
}
