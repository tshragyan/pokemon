<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationService
{
    public function create(array $data): Location
    {
        $location = Location::where('country', $data['country'])
        ->where('city', $data['city'])
        ->where('street', $data['street'])
        ->first();

        if (!$location) {
            $location = new Location();
            $location->country = $data['country'];
            $location->city = $data['city'];
            $location->street = $data['street'];
            $location->save();
        }

        return $location;
    }

    public function findById(int $id): Location
    {
        return Location::find($id);
    }

    public function getList(): Collection
    {
        return Location::all();
    }

    public function update($data, Location $location): Location
    {
        $location->country = $data['country'];
        $location->city = $data['city'];
        $location->street = $data['street'];
        return $location;
    }

    public function delete(Location $location): bool
    {
        $location->delete();
        return true;
    }
}
