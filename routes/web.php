<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\CaseController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\BookConsultationController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale?}', [LanguageController::class, 'change'])
    ->name('changeLanguage');

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/home", fn() => redirect(route("home")));
Route::get("/about-us", [AboutUsController::class, "index"])->name("aboutUs");
Route::get("/services", [ServicesController::class, "index"])->name("services");
Route::get("/faq", [FAQController::class, "index"])->name("faq");
Route::get("/cases", [CasesController::class, "index"])->name("cases");
Route::resource("book-consultation", BookConsultationController::class)
    ->only(["index", "store"]);

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', fn() => redirect(route('pages.index')));
        // Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        Route::resource('pages', PageController::class)->only(['index', 'edit', 'update']);
        Route::resource('cases', CaseController::class)->except(['show']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
    });
});

require __DIR__ . '/auth.php';
