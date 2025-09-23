<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCountry;
use App\Services\CasesService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function __construct(
        private CasesService $casesService,
        private ?object $cases
    ) {}

    public function index(Request $request): View
    {
        $query = $request->query();

        if ($query && isset($query['country']))
            $this->cases = $this->casesService->getCasesByCountry($query['country']);

        $this->cases = $this->casesService->getVisibleCases($this->cases);
        
        if ($this->cases->isNotEmpty()) {
          $this->cases = $this->cases->toQuery()->paginate(5)->appends($query);
        } else {
          $this->cases = collect();
        }

        return view('cases.index')
            ->with([
                'cases' => $this->cases,
                'countries' => ProductCountry::all(),
                'selectedCountry' => $query['country'] ?? null
            ]);
    }
}
