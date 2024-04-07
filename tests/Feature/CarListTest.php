<?php

use App\Livewire\CarList;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Number;

it('renders the car list component', function () {
    Livewire::test(CarList::class)
        ->assertOk();
});

it('shows brand model and year', function () {
    Car::factory()
        ->for(
            Brand::factory()
                ->state(['name' => 'Toyota'])
        )
        ->state([
            'model' => 'Corolla',
            'year' => '2017'
        ])
        ->create();

    Car::factory()
        ->for(
            Brand::factory()
                ->state(['name' => 'Hyundai'])
        )
        ->state([
            'model' => 'Accent',
            'year' => '2001'
        ])
        ->create();
    
    Car::factory()
        ->for(
            Brand::factory()
                ->state(['name' => 'Audi'])
        )
        ->state([
            'model' => 'A3',
            'year' => '2021'
        ])
        ->create();

    Livewire::test(CarList::class)
        ->assertOk()
        ->assertSeeText([
            'Toyota', 'Corolla', '2017',
            'Hyundai', 'Accent', '2001',
            'Audi', 'A3', '2021',
        ]);
});

it('shows a list of images', function () {
    $car = Car::factory()
        ->for(
            Brand::factory()
                ->state(['name' => 'Toyota'])
        )
        ->state([
            'model' => 'Corolla',
            'year' => '2017',
            'images' => [
                'image1.jpg', 
                'image2.jpg', 
                'image2.jpg'
            ]
        ])
        ->create();

    Livewire::test(CarList::class)
        ->assertOk()
        ->assertSee([
            'image1.jpg', 'image2.jpg', 'image2.jpg'
        ]);
});

it('shows the formatted car price', function () {
    Car::factory()
        ->for(
            Brand::factory()
        )
        ->state([
            'price' => 10_000,
        ])
        ->create();

    Livewire::test(CarList::class)
        ->assertOk()
        ->assertSeeText(Number::currency(10_000));
});

it('can filter posts by car brand', function () {
    
    $cars = Car::factory()->count(10)
        ->for(Brand::factory())
        ->create();
 
    $brandId = $cars->first()->brand_id;
 
    Livewire::test(CarList::class)
        ->assertCanSeeTableRecords($cars)
        ->filterTable('brand_id', $brandId)
        ->assertCanSeeTableRecords($cars->where('brand_id', $brandId))
        ->assertCanNotSeeTableRecords($cars->where('brand_id', '!=', $brandId));
});

it('can filter posts by car model', function () {
    
    $cars = Car::factory()->count(10)
        ->for(Brand::factory())
        ->create();
 
    $model = $cars->first()->model;
 
    Livewire::test(CarList::class)
        ->assertCanSeeTableRecords($cars)
        ->filterTable('model', $model)
        ->assertCanSeeTableRecords($cars->where('model', 'LIKE', "%$model%"))
        ->assertCanNotSeeTableRecords($cars->where('model', 'NOT LIKE', "%$model%"));
});
