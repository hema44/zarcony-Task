<?php

namespace Database\Seeders;

use App\Models\Orders_details;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersDetialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders_details::factory(50000)->create();
    }
}
