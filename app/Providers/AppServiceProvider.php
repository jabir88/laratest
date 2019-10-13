<?php

namespace App\Providers;

use App\User;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.inc.header', function ($view) {
            $dep_am = User::where('id', Auth::user()->id)->first();
            $view->with(compact('dep_am'));
        });
    }
}
