<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTranslation extends Model
{
    protected $fillable = [
        "name",
        "description",
        "price",
        "main_advantages",
        "locale",
        "product_id"
    ];

    protected $casts = [
        "name" => "string",
        "description" => "string",
        "price" => "string",
        "main_advantages" => "string",
        "locale" => "string",
        "product_id" => "integer"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
