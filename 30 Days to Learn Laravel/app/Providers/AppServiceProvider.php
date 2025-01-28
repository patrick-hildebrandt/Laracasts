<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::preventsLazyLoading(); // wrong one, returns boolean
        Model::preventLazyLoading();

        // Paginator::defaultView('my.pagination.view');
        // Paginator::useBootstrapFive();
    }
}
