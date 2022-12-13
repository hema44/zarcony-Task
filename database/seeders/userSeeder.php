<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"admin",
            "phone"=>"0120326598",
            "email"=>"admin@admin.com",
            "is_admin"=>1,
            "password"=>Hash::make("123456789"),
        ]);
        User::factory()->count(1000)->create();
    }
}
