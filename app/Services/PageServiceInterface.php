<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

interface PageServiceInterface
{
    public function updatePageTranslations(Collection $pageTranslations, array $validatedInput): void;
    public function getPageByUri(?string $uri): Page|null;
}
