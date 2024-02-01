<?php

namespace App\Providers;

use App\Services\LocationService;
use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('location_faced', function() {
            return new LocationService();
        });
    }
}
