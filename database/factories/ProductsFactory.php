<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            "product7.jpg",
            "product8.jpg",
            "product9.jpg",
            "product10.jpg",
            "product11.jpg",
            "product12.jpg",
        ];

        return [
            'brand_id' => rand(1,1000),
            'title' => $this->faker->word,
            'sku' => $this->faker->unique()->numberBetween(1000000,1000000000),
            'details' => $this->faker->text,
            'price' => $this->faker->numberBetween(10,100),
            "image"=>$images[$this->faker->numberBetween(0,5)]
        ];
    }
}
