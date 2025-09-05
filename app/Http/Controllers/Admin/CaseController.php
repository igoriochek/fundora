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

            $this->casesService->createCase($validatedInput);

            $caseId = Product::select('id', 'created_at')->latest('created_at')->first()->id;

            $this->casesService->createCaseTranslations($caseId, $validatedInput);
            $this->casesService->uploadCaseImage($validatedInput['image']);

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseCreate') . '.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Product $case): View
    {
        $this->authorize('update', $case);

        return view('admin.cases.edit')
            ->with([
                'case' => $case,
                'countries' => ProductCountry::all()
            ]);
    }

    public function update(UpdateProductRequest $request, Product $case): RedirectResponse
    {
        try {
            $this->authorize('update', $case);

            $validatedInput = $request->validated();
            $validatedInput['image'] = array_key_exists('image',  $validatedInput)
                ? $validatedInput['image']
                : $case->image;
            $caseTranslations = $case->translations()->get();

            // Checking whether the new image is different from the previous image.
            if ($validatedInput['image'] !== $case->image) {
                $this->casesService->removeCaseImage($case->image);
                $this->casesService->uploadCaseImage($validatedInput['image']);

                $validatedInput['image'] = $validatedInput['image']->getClientOriginalName();
            }

            $this->casesService->updateCase($case, $validatedInput);
            $this->casesService->updateCaseTranslations($caseTranslations, $validatedInput);

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseUpdate') . " '$case->name'.");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $case): RedirectResponse
    {
        try {
            $this->authorize('delete', $case);

            $case->delete();

            if (!$this->casesService->casesWithSameImageExist($case->image))
                $this->casesService->removeCaseImage($case->image);

            return redirect(route('cases.index'))
                ->with('success', __('messages.successCaseDelete') . " '$case->name'.");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
