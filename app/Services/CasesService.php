<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductCountry;
use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CasesService implements CasesServiceInterface
{
    public function getCasesByCountry(string $country): Collection
    {
        return ProductCountry::join(
            'product_country_translations',
            'product_country_translations.product_country_id',
            'product_countries.id'
        )
            ->where(
                'product_country_translations.name',
                'LIKE',
                "%{$country}%"
            )
            ->first()
            ->products;
    }

    public function getVisibleCases(?Collection $cases): Collection
    {
        if ($cases)
            return $cases->where('is_visible', true);

        return Product::where('is_visible', true)->get();
    }

    public function createCase(array $validatedInput): void
    {
        $caseInput = [
            'address' => $validatedInput['address'],
            'image' => $validatedInput['image']->getClientOriginalName(),
            'is_visible' => $validatedInput['is_visible'] ?? false,
            'product_country_id' => $validatedInput['product_country_id'],
        ];
        Product::firstOrCreate($caseInput);
    }

    public function createCaseTranslations(int $caseId, array $validatedInput): void
    {
        foreach (config('app.available_locales') as $locale) {
            $currentCaseTranslationInput = [
                'name' => $validatedInput["name_$locale"],
                'description' => $validatedInput["description_$locale"],
                'price' => $validatedInput["price_$locale"],
                'main_advantages' => $validatedInput["main_advantages_$locale"],
                'locale' => $locale,
                'product_id' => $caseId
            ];
            ProductTranslation::firstOrCreate($currentCaseTranslationInput);
        }
    }

    public function updateCase(Product $case, array $validatedInput): void
    {
        $caseInput = [
            'address' => $validatedInput['address'],
            'image' => $validatedInput['image'],
            'is_visible' => $validatedInput['is_visible'] ?? false,
            'product_country_id' => $validatedInput['product_country_id'],
        ];
        $case->update($caseInput);
    }

    public function updateCaseTranslations(Collection $caseTranslations, array $validatedInput): void
    {
        foreach ($caseTranslations as $caseTranslation) {
            $currentCaseTranslationInput = [
                'name' => $validatedInput["name_$caseTranslation->locale"],
                'description' => $validatedInput["description_$caseTranslation->locale"],
                'price' => $validatedInput["price_$caseTranslation->locale"],
                'main_advantages' => $validatedInput["main_advantages_$caseTranslation->locale"]
            ];
            $caseTranslation->update($currentCaseTranslationInput);
        }
    }

    public function casesWithSameImageExist(string $image): bool
    {
        $products = Product::select('id', 'image')
            ->where('image', $image)->get();

        if ($products->isEmpty())
            return false;

        return true;
    }

    public function uploadCaseImage(object $image): void
    {
        $imageName = $image->getClientOriginalName();
        $path = $_SERVER['DOCUMENT_ROOT'] . '/images/cases';
       
        if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
     $image->move($path, $imageName);

    Log::info(__('Successfully uploaded case image.'));
    }

    public function removeCaseImage(string $imageName): void
    {
        $pathWithImage = $_SERVER['DOCUMENT_ROOT'] . "/images/cases/$imageName";

    if (file_exists($pathWithImage)) {
        unlink($pathWithImage);
        Log::info(__('Successfully removed case image.'));
    } else {
        Log::error(__('Image file not found.'));
    }
    }
}
