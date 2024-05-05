<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Laravel\Scout\Searchable;

class Car extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'images' => 'json'
    ];

    protected $fillable = [
        'model',
        'year',
        'price',
        'images',
        'brand_id',
        'engine',
        'fuel_type',
        'transmission_type',
        'mileage',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Car $car) {
            foreach($car->images as $image) {
                Storage::delete($image);
            }
        });

        static::updating(function (Car $car) {
            
            $imagesToDelete = array_diff($car->getOriginal('images'), $car->images);

            foreach($imagesToDelete as $image) {
                Storage::delete($image);
            }
        });

        static::creating(function (Car $car) {
            $car->owner_id = auth()->user()->id;
        });
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::currency($attributes['price'])
        );
    }

    public function toSearchableArray()
    {
        return [
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'price' => $this->price
        ];
    }
}
