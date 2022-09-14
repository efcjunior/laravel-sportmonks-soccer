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
        $configPath = __DIR__ . '/../../config';

        $this->mergeConfigFrom($configPath . '/config.php', 'soccerapi');

        $this->publishes([
            $configPath . '/config.php' => config_path('soccerapi.php'),
        ], 'config');
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
