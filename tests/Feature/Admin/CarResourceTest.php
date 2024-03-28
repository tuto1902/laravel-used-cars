<?php

use App\Filament\Resources\CarResource;
use App\Models\Brand;
use App\Models\Car;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('renders the resource page', function () {
    actingAs(User::factory()->create());

    get(CarResource::getUrl())
        ->assertOk();
});

it('can list cars', function () {
    $records = Car::factory(3)
        ->for(Brand::factory())
        ->create();

    Livewire::test(CarResource\Pages\ListCars::class)
        ->assertCanSeeTableRecords($records);
});
