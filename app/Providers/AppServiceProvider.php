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
        $this->app->bind('App\Services\UserService', 'App\Services\Impl\UserServiceImpl');
        $this->app->bind('App\Services\AccueilService', 'App\Services\Impl\AccueilServiceImpl');
        $this->app->bind('App\Services\HaldeService', 'App\Services\Impl\HaldeServiceImpl');
        $this->app->bind('App\Services\DemandeService', 'App\Services\Impl\DemandeServiceImpl');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
