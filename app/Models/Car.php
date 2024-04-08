<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class Car extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'json'
    ];

    protected $fillable = [
        'model',
        'year',
        'price',
        'images',
        'brand_id',
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
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::currency($attributes['price'])
        );
    }
}
