<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BrandSFactory extends Factory
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
            "name"=>$this->faker->name,
            "image"=>$images[$this->faker->numberBetween(0,5)]
        ];
    }
}
