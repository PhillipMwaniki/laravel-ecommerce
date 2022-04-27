<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function formattedPrice(): Money
    {
        return money($this->price);
    }

    public function variations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Variation::class);
    }
}
