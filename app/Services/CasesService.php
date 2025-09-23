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
        $productCountry = ProductCountry::join(
            'product_country_translations',
            'product_country_translations.product_country_id',
            'product_countries.id'
        )
        ->where('product_country_translations.name', 'LIKE', "%{$country}%")
        ->select('product_countries.*')
        ->first();

    if (!$productCountry) {
        return collect();
    }

    return $productCountry->products ?? collect();
    }

    public function getVisibleCases(?Collection $cases): Collection
    {
        if ($cases)
            return $cases->where('is_visible', true);

        return Product::where('is_visible', true)->get();
    }

    public function createCase(array $validatedInput): Product
    {
        return Product::create([
            'address' => $validatedInput['address'],
            'is_visible' => $validatedInput['is_visible'] ?? false,
            'product_country_id' => $validatedInput['product_country_id'],
        ]);
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

    public function removeCaseImage(string $imageName): void
    {
        $pathWithImage = public_path('images/cases/' . $imageName);

        if (file_exists($pathWithImage)) {
            unlink($pathWithImage);
            Log::info(__('Successfully removed case image.'));
        } else {
            Log::error(__('Image file not found.'));
        }
    }

    public function uploadCaseImages(Product $product, array $images, string $imageOrder): void
    {
        $orderIndexes = explode(',', $imageOrder);
        $sortedFiles = [];

        foreach ($orderIndexes as $index) {
            if (isset($images[$index])) {
                $sortedFiles[] = $images[$index];
            }
        }

        foreach ($sortedFiles as $sortIndex => $image) {
            $this->storeNewImage($product, $image, $sortIndex);
        }

        Log::info("Successfully uploaded case images.");
    }

    public function updateImageOrder(Product $case, array $imageOrder): void
    {
        foreach ($imageOrder as $item) {
            if (!empty($item['id'])) {
                $caseImage = $case->images()->find($item['id']);
                if ($caseImage && $caseImage->sort_order !== $item['sort_order']) {
                    $caseImage->update([
                        'sort_order' => $item['sort_order'],
                    ]);
                }
            }
        }
    }
    
    public function storeNewImage(Product $case, $file, int $sortOrder): void
    {
        $imageName = $this->saveImageToDisk($file);

        $case->images()->create([
            'image' => $imageName,
            'sort_order' => $sortOrder,
        ]);

        Log::info("New case image uploaded: $imageName");
    }

    private function saveImageToDisk($file): string
    {
        $path = public_path('images/cases');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $imageName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move($path, $imageName);

        return $imageName;
    }
}
