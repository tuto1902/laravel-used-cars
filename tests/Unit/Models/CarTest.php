<?php

use App\Models\Brand;
use App\Models\Car;

test('it has a brand', function () {
    $car = Car::factory()
        ->for(
            Brand::factory()
        )
        ->create();
    
    expect($car->brand)
        ->toBeInstanceOf(Brand::class);
});
