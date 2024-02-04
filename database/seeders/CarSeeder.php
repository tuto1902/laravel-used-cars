<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory(6)
        ->for(
            Brand::factory()
                ->state(['name' => 'Toyota'])
        )
        ->state([
            'model' => 'Corolla',
            'year' => '2017',
            'images' => [
                'car1.jpeg', 
                'car2.jpeg', 
                'car3.jpeg'
            ]
        ])
        ->create();
    }
}
