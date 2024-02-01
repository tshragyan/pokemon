<?php

namespace App\Facades;

use App\Models\Location;
use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $data)
 * @method static findById(int $id)
 * @method static getList()
 * @method static update(array $data, Location $location)
 * @method static delete(Location $location)
 */
class LocationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'location_faced';
    }
}
