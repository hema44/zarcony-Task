<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class brandSeeder extends Seeder
{


    public function run()
    {
        Brands::factory()->count(5000)->create();
    }
}
