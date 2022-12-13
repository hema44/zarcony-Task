<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Orders_detailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'orders_id' => rand(1,50000),
            'product_id' => rand(1,5000),
            'quantity' => rand(1,5),
            'price' => rand(10,100)
        ];
    }
}
