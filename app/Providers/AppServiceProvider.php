<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use \App\Webcontent;

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
        $logo = \App\Webcontent::where('webcontent_type', 1)->orderBy('id', 'DESC')->first();
        view()->share('site_logo', $logo);

        Schema::defaultStringLength(191);
    }
}