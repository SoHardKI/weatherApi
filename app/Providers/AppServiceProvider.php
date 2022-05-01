<?php

namespace App\Providers;

use App\Contracts\WeatherApi;
use App\Services\Api\Openweathermap;
use App\Services\WeatherService;
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
        $this->app->when(WeatherService::class)
            ->needs(WeatherApi::class)
            ->give(Openweathermap::class);
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
