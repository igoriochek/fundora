<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        "address",
        "is_visible",
        "product_country_id"
    ];

    protected $casts = [
        "address" => "string",
        "is_visible" => "boolean",
        "product_country_id" => "integer"
    ];

    protected $with = [
        "defaultTranslation"
    ];

    public function getNameAttribute(): string|null
    {
        return $this->defaultTranslation?->name;
    }

    public function getDescriptionAttribute(): string|null
    {
        return $this->defaultTranslation?->description;
    }

    public function getPriceAttribute(): string|null
    {
        return $this->defaultTranslation?->price;
    }

    public function getMainAdvantagesAttribute(): string|null
    {
        return $this->defaultTranslation?->main_advantages;
    }

    public function translation(string $locale): ProductTranslation|null
    {
        return $this->hasOne(ProductTranslation::class)
            ->where("locale", '=', $locale)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->hasOne(ProductTranslation::class)->where(
            'locale',
            app()->getLocale()
        );
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(
            ProductCountry::class,
            'product_country_id',
            'id'
        );
    }

    public function images(): HasMany
    {
      return $this->hasMany(ProductImage::class);
    }

    public function getMainImageAttribute(): ProductImage
    {
      return $this->images()->orderBy('sort_order', 'asc')->first();
    }
}
