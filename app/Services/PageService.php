<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageService implements PageServiceInterface
{
    public function updatePageTranslations(Collection $pageTranslations, array $validatedInput): void
    {
        foreach ($pageTranslations as $pageTranslation) {
            $currentTranslationValidatedInput = [
                'title' => $validatedInput["title_$pageTranslation->locale"],
                'description' => $validatedInput["description_$pageTranslation->locale"]
            ];
            $pageTranslation->update($currentTranslationValidatedInput);
        }
    }

    public function getPageByUri(?string $uri): Page|null
    {
        return Page::where('uri', $uri)->first();
    }
}
