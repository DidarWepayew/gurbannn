<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());
        Paginator::useBootstrapFive();

        View::composer(['client.home.index.brands'], function ($view) {
            $brands = Brand::orderBy('sort_order')
                ->get();

            $view->with([
                'brands' => $brands,
            ]);
        });
    }
}
