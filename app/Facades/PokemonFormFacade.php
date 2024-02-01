<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static findByTitle(array $data)
 * @method static getList()
 */
class PokemonFormFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'pokemon_form_facade';
    }
}
