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
//
//        Gate::define('admin', function (User $user, Post $model): bool
//        {
//            //dd(1111111);
//            return $model->role === 'admin';
//        }
//        );

        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
