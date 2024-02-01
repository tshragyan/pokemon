<?php

namespace App\Facades;

use App\Models\Ability;
use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $data)
 * @method static findById(int $id)
 * @method static getList()
 * @method static update(array $data, Ability $ability)
 * @method static delete(Ability $ability)
 */
class AbilityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ability_facade';
    }
}
