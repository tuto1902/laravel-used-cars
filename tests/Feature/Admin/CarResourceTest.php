<?php

use App\Filament\Resources\CarResource;
use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteAction as TableDeleteAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\get;

beforeEach(function () {
    actingAs(User::factory()->create());

    Storage::fake('images');
});

it('renders the resource page', function () {   
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

it('renders the create page', function () {
    get(CarResource::getUrl('create'))
        ->assertOk();
});

it('can create a car', function () {
    $newCar = Car::factory()
        ->for(Brand::factory())
        ->make();

    Livewire::test(CarResource\Pages\CreateCar::class)
        ->fillForm([
            'model' => $newCar->model,
            'year' => $newCar->year,
            'price' => $newCar->price,
            'images' => $newCar->images,
            'brand_id' => $newCar->brand->getKey()
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('cars', [
        'model' => $newCar->model,
        'year' => $newCar->year,
        'price' => $newCar->price,
        'images' => json_encode($newCar->images),
        'brand_id' => $newCar->brand->getKey()
    ]);
});

it('can upload car images', function () {
    $newCar = Car::factory()
        ->for(Brand::factory())
        ->make();

    $file = UploadedFile::fake()->image('1.png');

    Livewire::test(CarResource\Pages\CreateCar::class)
        ->fillForm([
            'model' => $newCar->model,
            'year' => $newCar->year,
            'price' => $newCar->price,
            'images' => [$file],
            'brand_id' => $newCar->brand->getKey()
        ])
        ->call('create')
        ->assertHasNoFormErrors();
    
    $car = Car::first();
    Storage::disk('images')->assertExists($car->images[0]);
});

it('renders the edit page', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();

    get(CarResource::getUrl('edit', ['record' => $car]))
        ->assertOk();
});

it('can update a car', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();

    $newCar = Car::factory()
        ->for(Brand::factory())
        ->make();
 
    Livewire::test(CarResource\Pages\EditCar::class, [
        'record' => $car->getRouteKey(),
    ])
    ->fillForm([
        'model' => $newCar->model,
        'year' => $newCar->year,
        'price' => $newCar->price,
        'images' => $newCar->images,
        'brand_id' => $newCar->brand->getKey()
    ])
    ->call('save')
    ->assertHasNoFormErrors();
 
    expect($car->refresh())
        ->model->toBe($newCar->model)
        ->year->toBe($newCar->year)
        ->price->toBe($newCar->price)
        ->images->toBe($newCar->images)
        ->brand_id->toBe($newCar->brand_id);
});

it('can delete a car from the edit page', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();
 
    Livewire::test(CarResource\Pages\EditCar::class, [
        'record' => $car->getRouteKey(),
    ])
    ->callAction(DeleteAction::class);
 
    assertModelMissing($car);
});

it('can delete a car from the list page', function () {
    $car = Car::factory()
        ->for(Brand::factory())
        ->create();
 
    Livewire::test(CarResource\Pages\ListCars::class)
        ->callTableAction(TableDeleteAction::class, $car);
 
    assertModelMissing($car);
});

it('can delete car images after car is deleted', function () {
    
    $newCar = Car::factory()
        ->for(Brand::factory())
        ->make();
    
    $file = UploadedFile::fake()->image('1.png');

    Livewire::test(CarResource\Pages\CreateCar::class)
        ->fillForm([
            'model' => $newCar->model,
            'year' => $newCar->year,
            'price' => $newCar->price,
            'images' => [$file],
            'brand_id' => $newCar->brand->getKey()
        ])
        ->call('create');

    $car = Car::first();
    
    Livewire::test(CarResource\Pages\ListCars::class)
        ->callTableAction(TableDeleteAction::class, $car);
    
    Storage::disk('images')->assertMissing($car->images[0]);
});