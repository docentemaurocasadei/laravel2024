<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Illuminate\Support\Str;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<50;$i++){
            Car::create([
                'name' => Str::random(10),
                'brand_id' => 2,
                'hp' => Str::random(2),
            ]);            
        }
        // Car::factory()
        // ->count(50)
        // ->create();
    }
}
