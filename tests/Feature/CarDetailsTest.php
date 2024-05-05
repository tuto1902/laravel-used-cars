<?php

use App\Livewire\CarDetails;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarMeta;
use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function (){
    actingAs(User::factory()->create());
});

it('renders the car details component', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();

    Livewire::test(CarDetails::class, ['car' => $car])
        ->assertOk();
});

it('shows a list of images', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();

    Livewire::test(CarDetails::class, ['car' => $car])
        ->assertOk()
        ->assertSee(['1.png', '2.png', '3.png']);
});

it('show the seller contact information', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->for(User::factory(), 'owner')
        ->create();

    Livewire::test(CarDetails::class, ['car' => $car])
        ->assertOk()
        ->assertSeeText([
            $car->owner->name,
            $car->owner->email,
        ]);
});

it('shows car details', function() {
    $car = Car::factory()
        ->state([
            'engine' => '2000cc',
            'fuel_type' => 'Gasoline',
            'transmission_type' => 'Automatic',
            'mileage' => '15000 km'
        ])
        ->for(Brand::factory())
        ->for(User::factory(), 'owner')
        ->create();
    
    Livewire::test(CarDetails::class, ['car' => $car])
        ->assertOk()
        ->assertSeeText([
            '2000cc',
            'Gasoline',
            'Automatic',
            '15000 km',
        ]);
});
