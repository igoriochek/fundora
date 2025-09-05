<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCountryTranslation extends Model
{
    protected $fillable = [
        "name",
        "locale",
        "product_country_id"
    ];

    protected $casts = [
        "name" => "string",
        "locale" => "string",
        "product_country_id" => "integer"
    ];

    public $timestamps = false;

    public function country(): BelongsTo
    {
        return $this->belongsTo(ProductCountry::class);
    }
}
