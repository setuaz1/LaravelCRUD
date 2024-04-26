<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\AdminPolicy;
use Illuminate\Auth\Access\Gate;
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

        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::except([
            '/posts'
        ]);


        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
