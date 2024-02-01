<?php

namespace App\Providers;

use App\Services\PokemonService;
use Illuminate\Support\ServiceProvider;

class PokemonServiceProvider extends ServiceProvider
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
        $this->app->bind('pokemon_facade', function() {
            return new PokemonService();
        });
    }
}
