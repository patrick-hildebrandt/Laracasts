<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Job;

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

        // Gate::define('edit-job', function(User $user, Job $job) {
        // // Gate::define('edit-job', function([?]User $user[ = null], Job $job) {
        // // => to reach return instead of standard abort from Gate::authorize
        //     return $job->employer->user->is($user);
        // });
    }
}
