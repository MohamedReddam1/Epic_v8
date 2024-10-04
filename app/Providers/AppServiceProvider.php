<?php

namespace App\Providers;

use App\Http\View\Composers\GlobalComposer;
use App\Http\View\Composers\NotificationsComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /*
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /*
     * Bootstrap any application services.
     */


    public function boot()
    {
        view()->composer('*', [NotificationsComposer::class, 'compose']);
        View()->composer('*', GlobalComposer::class);
    }
}