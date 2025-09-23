<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCountry;
use App\Services\CasesService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CaseController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private CasesService $casesService) {}

    public function index(): View
    {
        $this->authorize('viewAny', Product::class);

        return view('admin.cases.index')
            ->with('cases', Product::paginate(10));
    }

    public function create(): View
    {
        $this->authorize('create', Product::class);

        return view('admin.cases.create')
            ->with('countries', ProductCountry::all());
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $this->authorize('create', Product::class);

            $validatedInput = $request->validated();

            $case = $this->casesService->createCase($validatedInput);

            $this->casesService->createCaseTranslations($case->id, $validatedInput);

            if ($request->hasFile('images')) {
                $this->casesService->uploadCaseImages(
                $case,
                $request->file('images'),
                $request->input('image_order')
                );
            }

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseCreate') . '.');
        } catch (Exception $e) {
        return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Product $case): View
    {
        $this->authorize('update', $case);

        $countries = ProductCountry::all();

        $selectedCountry = $case->product_country_id;
        $selectedCountryName = $countries->firstWhere('id', $selectedCountry)?->name ?? '';

        return view('admin.cases.edit')
            ->with([
                'case' => $case,
                'countries' => $countries,
                'selectedCountry' => $selectedCountry,
                'selectedCountryName' => $selectedCountryName,
            ]);
    }

    public function update(UpdateProductRequest $request, Product $case): RedirectResponse
    {
        try {

            $this->authorize('update', $case);

            $validatedInput = $request->validated();
            $caseTranslations = $case->translations()->get();

            $this->casesService->updateCase($case, $validatedInput);
            $this->casesService->updateCaseTranslations($caseTranslations, $validatedInput);
            $this->handleRemovedImages($request, $case);
            $this->handleNewImages($request, $case);
            $this->handleImageOrder($request, $case);

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseUpdate') . " '{$case->name}'.");

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $case): RedirectResponse
    {
        try {
            $this->authorize('delete', $case);

            foreach ($case->images as $image) 
            {
                $this->casesService->removeCaseImage($image->image);
            }

            $case->delete();

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseDelete') . " '$case->name'.");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    private function handleRemovedImages(UpdateProductRequest $request, Product $case): void
    {
        if (!$request->filled('removed_images')) return;

        $removedImages = json_decode($request->input('removed_images'), true);

        foreach ($removedImages as $imageName) 
        {
            $this->casesService->removeCaseImage($imageName);
            $case->images()->where('image', $imageName)->delete();
        }
    }

    private function handleNewImages(UpdateProductRequest $request, Product $case): void
    {
        if (!$request->hasFile('images')) return;

        $imageOrder = json_decode($request->input('image_order'), true) ?? [];
        foreach ($request->file('images') as $file) 
        {
            $orderItem = collect($imageOrder)->firstWhere('file_name', $file->getClientOriginalName());
            $sortOrder = $orderItem['sort_order'] ?? 0;
            $this->casesService->storeNewImage($case, $file, $sortOrder);
        }
    }

    private function handleImageOrder(UpdateProductRequest $request, Product $case): void
    {
        if (!$request->filled('image_order')) return;

        $imageOrder = json_decode($request->input('image_order'), true);
        $this->casesService->updateImageOrder($case, $imageOrder);
    }
}
