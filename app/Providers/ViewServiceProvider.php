<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /* 
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /*
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = Auth::user();
            if ($user) {
                $newNotificationsCount = Notification::where('id_user', $user->id)
                    ->whereNull('read_at')
                    ->count();
                $view->with('newNotificationsCount', $newNotificationsCount);
            }
        });
    }
}