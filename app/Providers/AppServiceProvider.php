<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Product;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Services\CasesService;
use App\Services\CasesServiceInterface;
use App\Services\PageService;
use App\Services\PageServiceInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('app.env') == 'production')
            $this->app->bind(
                'path.public',
                fn() => base_path('htdocs')
            );

        $this->app->bind(CasesServiceInterface::class, CasesService::class);
        $this->app->bind(PageServiceInterface::class, PageService::class);

        Gate::policy(Page::class, PagePolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') == 'production')
            URL::forceScheme('https');

        $path = resource_path('svg');

        if (!File::isDirectory($path))
            File::makeDirectory($path);
    }
}
