<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total' => $this->faker->numberBetween(100,1000),
            'order_status' => $this->faker->randomElement(['cancelled','paid','pending']),
            'payment_method' => 'cod',
            'user_id' => rand(1,1000),
            'address' => $this->faker->address
        ];
    }
}
