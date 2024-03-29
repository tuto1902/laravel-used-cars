<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Car extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'json'
    ];

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
