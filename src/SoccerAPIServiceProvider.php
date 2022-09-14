<?php

namespace Sportmonks\SoccerAPI;

use Illuminate\Support\ServiceProvider;

class SoccerAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/soccerapi.php', 'soccerapi'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('soccerapi', function () {
            return new SoccerAPI();
        });
    }
}
