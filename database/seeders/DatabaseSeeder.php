<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(brandSeeder::class);
        $this->call(ProudctSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(OrdersDetialsSeeder::class);
    }
}
