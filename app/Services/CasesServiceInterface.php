<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface CasesServiceInterface
{
    public function getCasesByCountry(string $country): Collection;
    public function getVisibleCases(?Collection $cases): Collection;
    public function createCase(array $validatedInput): void;
    public function createCaseTranslations(int $caseId, array $validatedInput): void;
    public function updateCase(Product $case, array $validatedInput): void;
    public function updateCaseTranslations(Collection $caseTranslations, array $validatedInput): void;
    public function casesWithSameImageExist(string $image): bool;
    public function uploadCaseImage(object $image): void;
    public function removeCaseImage(string $imageName): void;
}
