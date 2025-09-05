<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductCountry extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $with = [
        "defaultTranslation"
    ];

    public $timestamps = false;

    public function getNameAttribute(): string|null
    {
        return $this->defaultTranslation?->name;
    }

    public function translation(string $locale): ProductCountryTranslation|null
    {
        return $this->hasOne(ProductCountryTranslation::class)
            ->where("locale", '=', $locale)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(
            ProductCountryTranslation::class
        );
    }

    public function defaultTranslation(): HasOne
    {
        return $this->hasOne(ProductCountryTranslation::class)->where(
            "locale",
            app()->getLocale()
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class,
            "product_country_id",
            "id"
        );
    }
}
