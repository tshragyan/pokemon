<?php

namespace App\Facades;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $data)
 * @method static findById(int $id)
 * @method static getList(array $data)
 * @method static update(array $data, Pokemon $pokemon)
 * @method static delete(Pokemon $pokemon)
 */
class PokemonFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pokemon_facade';
    }
}
