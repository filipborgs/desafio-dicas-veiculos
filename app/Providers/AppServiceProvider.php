<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Contracts\BrandContract',
            'App\Repositories\BrandRepository'
        );

        $this->app->bind(
            'App\Contracts\VehicleContract',
            'App\Repositories\VehicleRepository'
        );

        $this->app->bind(
            'App\Contracts\TipContract',
            'App\Repositories\TipRepository'
        );
    }
}
