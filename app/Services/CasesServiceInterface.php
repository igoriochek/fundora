<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface CasesServiceInterface
{
    public function getCasesByCountry(string $country): Collection;
    public function getVisibleCases(?Collection $cases): Collection;
    public function createCase(array $validatedInput): Product;
    public function createCaseTranslations(int $caseId, array $validatedInput): void;
    public function updateCase(Product $case, array $validatedInput): void;
    public function updateCaseTranslations(Collection $caseTranslations, array $validatedInput): void;
    public function removeCaseImage(string $imageName): void;
    public function uploadCaseImages(Product $product, array $images, string $imageOrder): void;
    public function updateImageOrder(Product $case, array $imageOrder): void;
    public function storeNewImage(Product $case, $file, int $sortOrder): void;
}
