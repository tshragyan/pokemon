<?php

namespace App\Providers;

use App\Services\PokemonFormService;
use Illuminate\Support\ServiceProvider;

class PokemonFormServiceProvider extends ServiceProvider
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
        $this->app->bind('pokemon_form_facade', function() {
            return new PokemonFormService();
        });
    }
}
