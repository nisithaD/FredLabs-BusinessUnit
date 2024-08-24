<?php

namespace FredLabs\BusinessUnits\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessUnitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the migration files
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        // Publish the configuration file
        $this->publishes([
            __DIR__ . '/../../config/businessunit.php' => config_path('businessunit.php'),
        ], 'config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/businessunit.php', 'businessunit'
        );
    }
}
