<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\PageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __construct(private PageService $pageService) {}

    public function index(): View
    {
        $page = $this->pageService->getPageByUri(request()->path());

        return view('faq.index')
            ->with('page', $page);
    }
}
