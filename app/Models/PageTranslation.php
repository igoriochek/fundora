<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageTranslation extends Model
{
    protected $fillable = [
        "name",
        "title",
        "description",
        "locale",
        "page_id"
    ];

    protected $casts = [
        "name" => "string",
        "title" => "string",
        "description" => "string",
        "locale" => "string",
        "page_id" => "integer"
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
