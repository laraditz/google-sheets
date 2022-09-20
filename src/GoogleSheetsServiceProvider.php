<?php

namespace Laraditz\GoogleSheets;

use Illuminate\Support\ServiceProvider;

class GoogleSheetsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {     
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('google-sheets.php'),
            ], 'config');         
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'google-sheets');

        // Register the main class to use with the facade
        $this->app->singleton('google-sheets', function () {
            return new GoogleSheets;
        });
    }
}
