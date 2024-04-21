<?php

use App\Livewire\CarList;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Number;
use Livewire\Livewire;

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

it('shows the fist car image', function () {
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
            'image1.jpg'
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

    Car::factory()->count(9)
        ->for(Brand::factory())
        ->create();
    $car = Car::factory()
        ->for(Brand::factory()->state([ 'name' => 'TestBrand' ]))
        ->create();

    $brand = $car->brand->name;

    Livewire::test(CarList::class)
        ->assertCount('cars', 10)
        ->set('brand', $brand)
        ->refresh()
        ->assertCount('cars', 1);
});

it('can filter posts by car model', function () {

    Car::factory()->count(9)
        ->for(Brand::factory())
        ->create();
    
    $car = Car::factory()
        ->state(['model' => 'Test Model'])
        ->for(Brand::factory())
        ->create();

    $model = $car->model;

    Livewire::test(CarList::class)
        ->assertCount('cars', 10)
        ->set('model', $model)
        ->refresh()
        ->assertCount('cars', 1);
});

// it('can filter posts by a year from', function () {
//
//     $cars = Car::factory()->count(3)
//         ->state(new Sequence(
//             ['year' => 2016],
//             ['year' => 2017],
//             ['year' => 2018],
//         ))
//         ->for(Brand::factory())
//         ->create();
//
//     $yearFrom = 2017;
//
//     Livewire::test(CarList::class)
//         ->assertCanSeeTableRecords($cars)
//         ->filterTable('year', $yearFrom)
//         ->assertCanSeeTableRecords(
//             $cars->where('year', '>=', $yearFrom)
//         )
//         ->assertCanNotSeeTableRecords(
//             $cars->where('year', '<', $yearFrom)
//         );
// });
