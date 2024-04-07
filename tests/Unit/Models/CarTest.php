<?php

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('it has a brand', function () {
    $car = Car::factory()
        ->for(
            Brand::factory()
        )
        ->create();
    
    expect($car->brand)
        ->toBeInstanceOf(Brand::class);
});

it('deletes car images after car is updated', function () {
    
    Storage::fake('images');

    $images = ['1.png', '2.png'];

    $car = Car::factory()
        ->for(Brand::factory())
        ->state([
            'images' => $images
        ])
        ->create();
    
    foreach($images as $image) {
        $file = UploadedFile::fake()->image($image);
        Storage::disk('images')->put($file->name, $file->path());
    }

    array_shift($images);

    $car->images = $images;

    $deletedImages = array_diff($car->getOriginal('images'), $car->images);

    $car->save();
    
    Storage::disk('images')->assertMissing($deletedImages);
});
