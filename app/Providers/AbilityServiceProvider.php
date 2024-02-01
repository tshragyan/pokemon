<?php

namespace App\Providers;

use App\Services\AbilityService;
use Illuminate\Support\ServiceProvider;

class AbilityServiceProvider extends ServiceProvider
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
        $this->app->bind('ability_facade', function() {
            return new AbilityService();
        });
    }
}
